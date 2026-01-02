<?php

namespace Domain\Coupons\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InstructorCourseCouponCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($courseCoupon) {
                return [
                    'id' => $courseCoupon->id,
                    'discount' => $courseCoupon->discount,
                    'max_redemptions' => $courseCoupon->max_redemptions,
                    'expiry_date' => $courseCoupon->expiry_date
                ];
            })->toArray()
        ];
    }
}
