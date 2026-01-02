<?php

namespace Domain\Auth\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class DataConflictException extends Exception
{
    public function __construct(string $message, int $code = Response::HTTP_CONFLICT)
    {
        parent::__construct($message, $code);
    }
}
