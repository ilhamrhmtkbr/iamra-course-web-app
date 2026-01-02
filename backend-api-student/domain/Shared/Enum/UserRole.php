<?php

namespace Domain\Shared\Enum;

enum UserRole: string
{
    case USER = 'user';
    case STUDENT = 'student';
    case INSTRUCTOR = 'instructor';
}
