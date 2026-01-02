<?php

namespace Domain\Lessons\Policies;

use Domain\Shared\Models\InstructorLesson;
use Domain\Shared\Models\User;

class InstructorLessonPolicy
{
    public function update(User $user, InstructorLesson $instructorLesson): bool
    {
        return $user->username === $instructorLesson->instructorSection->instructorCourse->instructor_id;
    }

    public function delete(User $user, InstructorLesson $instructorLesson): bool
    {
        return $user->username === $instructorLesson->instructorSection->instructorCourse->instructor_id;
    }
}
