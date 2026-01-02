<?php

namespace Domain\Shared\Helpers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ResponseApiHelper
{
    public static function send(null|string|\Exception $item, int $code, mixed $data = null): \Illuminate\Http\JsonResponse
    {
        if ($item instanceof ModelNotFoundException) {
            $message = 'Data not found';
            $code = Response::HTTP_NOT_FOUND;
        } else if ($item instanceof ValidationException) {
            $message = $item->validator->errors()->first();
            $code = Response::HTTP_UNPROCESSABLE_ENTITY;
        } else if ($item instanceof AuthorizationException) {
            $message = 'You are not authorized to perform this action';
            $code = Response::HTTP_FORBIDDEN;
        } else if ($item instanceof \Exception) {
            $message = $item->getMessage();
        } else {
            $message = $item;
        }

        $isSuccess = '';

        if ($code == 0) {
            $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        // 🔴 error level 500 ke atas
        if ($code >= 500) {
            Log::channel('slack')->error("🚨 ERROR $code: $message", [
                'exception' => $item instanceof \Exception ? $item->getTraceAsString() : null
            ]);
        }

        if (in_array($code, range(200, 399))) {
            $isSuccess = true;
        } else if (in_array($code, range(400, 499))) {
            $isSuccess = false;
        }

        $structure = [
            'success' => $isSuccess,
            'message' => $message,
        ];

        if ($data != null) {
            $structure['data'] = $data;
        }

        return response()->json($structure, $code);
    }
}
