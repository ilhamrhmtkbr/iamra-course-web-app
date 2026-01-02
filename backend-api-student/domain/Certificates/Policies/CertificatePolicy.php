<?php

namespace Domain\Certificates\Policies;

use Domain\Shared\Models\StudentCertificate;
use Domain\Shared\Models\User;

class CertificatePolicy
{
    public function show(User $user, StudentCertificate $studentCertificate): bool
    {
        return $user->username === $studentCertificate->student_id;
    }

    public function download(User $user, StudentCertificate $studentCertificate): bool
    {
        return $user->username === $studentCertificate->student_id;
    }
}
