<?php

namespace Domain\Transactions\Actions;

use Carbon\Carbon;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Enum\InstructorCourseStatus;
use Domain\Shared\Enum\InstructorCourseVisibility;
use Domain\Shared\Enum\InstructorEarningStatus;
use Domain\Shared\Enum\StudentTransactionStatus;
use Domain\Shared\Models\InstructorCourse;
use Domain\Shared\Models\InstructorCourseCoupon;
use Domain\Shared\Models\InstructorEarning;
use Domain\Shared\Models\StudentTransaction;
use Domain\Transactions\Requests\TransactionStoreRequest;
use Domain\Transactions\Services\MidtransService;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class TransactionStoreAction
{
    public function __invoke(TransactionStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();

            $instructorCourse = InstructorCourse::where('id', $data['instructor_course_id'])
                ->where('visibility', InstructorCourseVisibility::PUBLIC->value)->first();
            if ($instructorCourse) {
                $studentTransaction = StudentTransaction::where('student_id', auth()->user()->getAuthIdentifier())
                    ->where('instructor_course_id', $data['instructor_course_id']);

                if ($studentTransaction->exists()) {
                    $data = $studentTransaction->first();
                    if ($data['status']->value === StudentTransactionStatus::SETTLEMENT->value ||
                        $data['status']->value === StudentTransactionStatus::PENDING->value) {
                        throw new \Exception(Lang::get('request-student.transaction_insert_failed_conflict_pending'), Response::HTTP_CONFLICT);
                    } else {
                        $studentTransactionDeleteAction = new TransactionCancelAction();
                        try {
                            $studentTransactionDeleteAction($data);
                        } catch (\Exception $e) {
                            throw new \Exception($e->getMessage(), $e->getCode());
                        }
                    }
                }

                $newOrder = new StudentTransaction();
                $newOrder->order_id = uniqid();
                $newOrder->student_id = auth()->user()->getAuthIdentifier();
                $newOrder->instructor_course_id = $data['instructor_course_id'];

                if ($data['instructor_course_coupon']) {
                    $newOrder->instructor_course_coupon_id = $data['instructor_course_coupon'];

                    $instructorCourseCoupon = InstructorCourseCoupon::findOrFail($newOrder->instructor_course_coupon_id);

                    if ($instructorCourseCoupon->max_redemptions <= 1 || $instructorCourseCoupon->expiry_date < Carbon::today()) {
                        throw new \Exception(Lang::get('request-student.transaction_insert_failed_coupon_expired'), Response::HTTP_BAD_REQUEST);
                    }

                    $newOrder->amount = (100 - $instructorCourseCoupon->discount) * ($instructorCourse->price / 100);
                } else {
                    $newOrder->amount = $instructorCourse->price;
                }

                $instructorEarning = new InstructorEarning();
                $instructorEarning->order_id = $newOrder->order_id;
                $instructorEarning->instructor_course_id = $newOrder->instructor_course_id;
                $instructorEarning->student_id = auth()->user()->getAuthIdentifier();

                if ($instructorCourse->status->value === InstructorCourseStatus::PAID->value) {
                    try {
                        $midtransService = new MidtransService();
                        $params = $midtransService->buildTransactionParams(
                            $instructorEarning->order_id, $newOrder->amount, $instructorCourse);
                        $responseFromMidtrans = $midtransService->createTransaction($params);

                        $newOrder->midtrans_data = json_encode($responseFromMidtrans);
                        $newOrder->status = StudentTransactionStatus::PENDING->value;

                        $instructorEarning->amount = $newOrder->amount;
                        $instructorEarning->status = InstructorEarningStatus::PENDING->value;

                        if ($data['instructor_course_coupon']) {
                            $instructorCourseCoupon->decrement('max_redemptions', 1);
                        }
                    } catch (\Exception $e) {
                        throw new \Exception($e->getMessage(), Response::HTTP_BAD_REQUEST);
                    }
                } else {
                    $newOrder->midtrans_data = '{"transaction": "value"}';
                    $newOrder->status = StudentTransactionStatus::SETTLEMENT->value;

                    $instructorEarning->amount = 0;
                    $instructorEarning->status = InstructorEarningStatus::SETTLEMENT->value;
                }

                $newOrder->save();
                $instructorEarning->save();
            } else {
                throw new \Exception(Lang::get('request-student.transaction_insert_failed_course_public'), Response::HTTP_NOT_FOUND);
            }
            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
