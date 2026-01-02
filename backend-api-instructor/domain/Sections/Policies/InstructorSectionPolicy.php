<?php

namespace Domain\Sections\Policies;

use Domain\Shared\Models\InstructorSection;
use Domain\Shared\Models\User;

class InstructorSectionPolicy
{
    public function update(User $user, InstructorSection $instructorSection): bool
    {
        return $user->username === $instructorSection->instructorCourse->instructor_id;
    }

    public function delete(User $user, InstructorSection $instructorSection): bool
    {
        return $user->username === $instructorSection->instructorCourse->instructor_id;
    }
}
