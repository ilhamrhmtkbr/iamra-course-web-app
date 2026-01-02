<?php

namespace Domain\Coupons\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourseCoupon;
use Domain\Shared\Models\StudentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CouponDeleteAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required'
            ]);
            if ($validator->fails()) {
                return ResponseApiHelper::send(
                    $validator->errors()->first(),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                );
            }
            if (StudentTransaction::where('instructor_course_coupon_id', $request->id)->exists()) {
                throw new \Exception(Lang::get('request-instructor.coupon_updele_failed_student_use'), Response::HTTP_CONFLICT);
            }

            $instructorCourseCoupon = InstructorCourseCoupon::findOrFail($request->id);

            Gate::authorize('delete', $instructorCourseCoupon);
            InstructorCourseCoupon::find($request->id)->delete();
            return ResponseApiHelper::send(Lang::get('request-success.delete_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
