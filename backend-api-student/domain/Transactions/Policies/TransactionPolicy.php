<?php

namespace Domain\Transactions\Policies;

use Domain\Shared\Models\StudentTransaction;
use Domain\Shared\Models\User;

class TransactionPolicy
{
    public function show(User $user, StudentTransaction $studentTransaction): bool
    {
        return $user->username === $studentTransaction->student_id;
    }

    public function cancel(User $user, StudentTransaction $studentTransaction): bool
    {
        return $user->username === $studentTransaction->student_id;
    }
}
