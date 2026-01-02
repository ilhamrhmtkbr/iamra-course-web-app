<?php

namespace Domain\Shared\Enum;

enum InstructorCourseVisibility: string
{
    case PRIVATE = 'private';
    case PUBLIC = 'public';
}
