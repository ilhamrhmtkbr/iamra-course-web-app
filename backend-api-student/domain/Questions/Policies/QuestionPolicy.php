<?php

namespace Domain\Questions\Policies;

use Domain\Shared\Models\StudentQuestion;
use Domain\Shared\Models\User;

class QuestionPolicy
{
    public function update(User $user, StudentQuestion $studentQuestion): bool
    {
        return $user->username === $studentQuestion->student_id;
    }

    public function delete(User $user, StudentQuestion $studentQuestion): bool
    {
        return $user->username === $studentQuestion->student_id;
    }
}
