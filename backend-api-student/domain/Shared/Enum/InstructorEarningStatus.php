<?php

namespace Domain\Shared\Enum;

enum InstructorEarningStatus: string
{
    case SETTLEMENT = 'settlement';
    case ACCEPTED = 'accepted';
    case DENY = 'deny';
    case PENDING = 'pending';
    case CANCEL = 'cancel';
    case EXPIRE = 'expire';
    case FAILURE = 'failure';
}
