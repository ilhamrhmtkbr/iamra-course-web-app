<?php

namespace Domain\Coupons\Actions;

use Domain\Coupons\Requests\CouponUpdateRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourseCoupon;
use Domain\Shared\Models\StudentTransaction;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class CouponUpdateAction
{
    public function __invoke(CouponUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            [
                'id' => $id,
                'discount' => $discount,
                'max_redemptions' => $max_redemptions,
                'expiry_date' => $expiry_date
            ] = $request->validated();

            $instructorCourseCoupon = InstructorCourseCoupon::findOrFail($id);
            Gate::authorize('update', $instructorCourseCoupon);

            if (StudentTransaction::where('instructor_course_coupon_id', $id)->exists()) {
                throw new \Exception(Lang::get('request-instructor.coupon_updele_failed_student_use'), Response::HTTP_CONFLICT);
            }

            $instructorCourseCoupon->discount = $discount;
            $instructorCourseCoupon->max_redemptions = $max_redemptions;
            $instructorCourseCoupon->expiry_date = $expiry_date;
            $instructorCourseCoupon->save();

            return ResponseApiHelper::send(Lang::get('request-success.update_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
