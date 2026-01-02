<?php

namespace Domain\Shared\Enum;

enum StudentCategory: string
{
    case LEARNER = 'learner';
    case EMPLOYEE = 'employee';
    case JOBLESS = 'jobless';
    case UNDEFINED = 'undefined';
}
