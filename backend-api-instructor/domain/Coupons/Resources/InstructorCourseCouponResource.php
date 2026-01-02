<?php

namespace Domain\Coupons\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructorCourseCouponResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'discount' => $this->discount,
            'max_redemptions' => $this->max_redemptions,
            'expiry_date' => $this->expiry_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'instructor_course' => $this->instructorCourse ? [
                'id' => $this->instructorCourse->id,
                'title' => $this->instructorCourse->title,
                'status' => $this->instructorCourse->status
            ] : null
        ];
    }
}
