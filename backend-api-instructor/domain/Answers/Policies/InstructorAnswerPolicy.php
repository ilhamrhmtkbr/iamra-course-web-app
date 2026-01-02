<?php

namespace Domain\Answers\Policies;

use Domain\Shared\Models\InstructorAnswer;
use Domain\Shared\Models\User;

class InstructorAnswerPolicy
{
    public function update(User $user, InstructorAnswer $instructorAnswer): bool
    {
        return $user->username === $instructorAnswer->instructor_id;
    }
}
