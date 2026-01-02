<?php

namespace Domain\Transactions\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\StudentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class TransactionShowAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $studentTransaction = StudentTransaction::where('order_id', $request->order_id)
                ->where('student_id', auth()->user()->getAuthIdentifier())
                ->with(['instructorCourse:id,title,image', 'instructorCourseCoupon:id,discount,expiry_date'])
                ->select(['order_id', 'student_id', 'instructor_course_id', 'instructor_course_coupon_id', 'amount', 'midtrans_data', 'status', 'created_at'])
                ->first();
            Gate::authorize('show', $studentTransaction);
            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $studentTransaction);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
