<?php

namespace Domain\Shared\Enum;

enum StudentTransactionStatus: string
{
    case ACCEPTED = 'accepted';
    case SETTLEMENT = 'settlement';
    case DENY = 'deny';
    case PENDING = 'pending';
    case CANCEL = 'cancel';
    case EXPIRE = 'expire';
    case FAILURE = 'failure';
}
