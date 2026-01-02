<?php

namespace Domain\Courses\Policies;

use Domain\Shared\Enum\UserRole;
use Domain\Shared\Models\User;

class InstructorCourseReviewPolicy
{
    public function index(User $user): bool
    {
        return $user->role->value !== UserRole::USER;
    }
}
