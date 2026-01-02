<?php

namespace Domain\Account\Policies;

use Domain\Shared\Models\InstructorAccount;
use Domain\Shared\Models\User;

class InstructorAccountPolicy
{
    public function view(User $user, InstructorAccount $instructorAccount): bool
    {
        return $user->username === $instructorAccount->instructor_id;
    }

    public function update(User $user, InstructorAccount $instructorAccount): bool
    {
        return $user->username === $instructorAccount->instructor_id;
    }
}
