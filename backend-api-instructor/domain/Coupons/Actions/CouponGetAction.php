<?php

namespace Domain\Coupons\Actions;

use Domain\Coupons\Resources\InstructorCourseCouponCollection;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourseCoupon;

class CouponGetAction
{
    public function __invoke(): InstructorCourseCouponCollection|\Illuminate\Http\JsonResponse
    {
        try {
            $data = InstructorCourseCoupon::whereHas('instructorCourse', function ($query) {
                $query->where('instructor_id', auth()->user()->getAuthIdentifier());
            })->select(['id', 'max_redemptions', 'discount', 'expiry_date'])
                ->paginate(5);
            return new InstructorCourseCouponCollection($data);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
