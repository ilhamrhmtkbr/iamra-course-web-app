<?php

namespace Domain\Courses\Policies;

use Domain\Shared\Models\InstructorCourse;
use Domain\Shared\Models\User;

class InstructorCoursePolicy
{
    public function show(User $user, InstructorCourse $instructorCourse): bool
    {
        return $user->username === $instructorCourse->instructor_id;
    }

    public function update(User $user, InstructorCourse $instructorCourse): bool
    {
        return $user->username === $instructorCourse->instructor_id;
    }

    public function delete(User $user, InstructorCourse $instructorCourse): bool
    {
        return $user->username === $instructorCourse->instructor_id;
    }
}
