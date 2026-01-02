<?php

namespace Domain\Carts\Policies;

use Domain\Shared\Models\StudentCart;
use Domain\Shared\Models\User;

class CartPolicy
{
    public function delete(User $user, StudentCart $studentCart): bool
    {
        return $user->username === $studentCart->student_id;
    }
}
