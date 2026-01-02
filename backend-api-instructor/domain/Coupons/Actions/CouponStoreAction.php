<?php

namespace Domain\Coupons\Actions;

use Domain\Coupons\Requests\CouponStoreRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourse;
use Domain\Shared\Models\InstructorCourseCoupon;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CouponStoreAction
{
    public function __invoke(CouponStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            [
                'instructor_course_id' => $instructor_course_id,
                'discount' => $discount,
                'max_redemptions' => $max_redemptions,
                'expiry_date' => $expiry_date
            ] = $request->validated();

            if (InstructorCourse::where('id', $instructor_course_id)
                ->where('instructor_id', '!=', auth()->user()->getAuthIdentifier())
                ->exists()) {
                throw new \Exception(Lang::get('request-instructor.section_insert_failed_no_access'), Response::HTTP_CONFLICT);
            }

            if (InstructorCourseCoupon::select(['instructor_course_id'])
                ->where('instructor_course_id', $instructor_course_id)->exists()){
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }

            $instructorCourseCoupon = new InstructorCourseCoupon();
            $instructorCourseCoupon->id = Str::uuid();
            $instructorCourseCoupon->instructor_course_id = $instructor_course_id;
            $instructorCourseCoupon->discount = $discount;
            $instructorCourseCoupon->max_redemptions = $max_redemptions;
            $instructorCourseCoupon->expiry_date = $expiry_date;
            $instructorCourseCoupon->save();

            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
