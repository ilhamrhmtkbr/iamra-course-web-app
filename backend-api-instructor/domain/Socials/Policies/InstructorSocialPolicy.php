<?php

namespace Domain\Socials\Policies;

use Domain\Shared\Models\InstructorSocial;
use Domain\Shared\Models\User;

class InstructorSocialPolicy
{
    public function update(User $user, InstructorSocial $instructorSocial): bool
    {
        return $user->username === $instructorSocial->instructor_id;
    }

    public function delete(User $user, InstructorSocial $instructorSocial): bool
    {
        return $user->username === $instructorSocial->instructor_id;
    }
}
