<?php

namespace Domain\Coupons\Policies;

use Domain\Shared\Models\InstructorCourseCoupon;
use Domain\Shared\Models\User;

class InstructorCourseCouponPolicy
{
    public function show(User $user, InstructorCourseCoupon $instructorCourseCoupon): bool
    {
        return $user->username === $instructorCourseCoupon->instructorCourse->instructor_id;
    }

    public function update(User $user, InstructorCourseCoupon $instructorCourseCoupon): bool
    {
        return $user->username === $instructorCourseCoupon->instructorCourse->instructor_id;
    }

    public function delete(User $user, InstructorCourseCoupon $instructorCourseCoupon): bool
    {
        return $user->username === $instructorCourseCoupon->instructorCourse->instructor_id;
    }
}
