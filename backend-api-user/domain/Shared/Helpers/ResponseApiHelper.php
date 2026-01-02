<?php

namespace Domain\Shared\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ResponseApiHelper
{
    public static function send(null|string|\Exception $item, int $code, mixed $data = null, string $cookieToken = ''): \Illuminate\Http\JsonResponse
    {
        if ($item instanceof ValidationException) {
            $message = $item->validator->errors()->first();
            $code = Response::HTTP_UNPROCESSABLE_ENTITY;
        } elseif ($item instanceof \Exception) {
            $message = $item->getMessage();
        } else {
            $message = $item;
        }

        if ($code == 0) {
            $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        } else if ($code >= 500) {
            Log::channel('slack')->error("🚨 ERROR $code: $message", [
                'exception' => $item instanceof \Exception ? $item->getTraceAsString() : null
            ]);

            $code = 500;
        }

        if (in_array($code, range(100, 399))) {
            $isSuccess = true;
        } else {
            $isSuccess = false;
        }

        $structure = [
            'success' => $isSuccess,
            'message' => $message,
        ];

        if ($data != null) {
            $structure['data'] = $data;
        }

        if ($cookieToken !== '') {
            $isProd = app()->environment('production');

            return response()->json($structure, $code)
                ->cookie(
                    'access_token',
                    $cookieToken,
                    60,
                    '/',
                    $isProd ? config('jwt.cookie.domain.prod') : null,
                    $isProd,                       // secure kalau prod
                    true,                          // httpOnly
                    false,                         // raw
                    $isProd ? 'None' : 'Lax'       // sameSite
                )
                ->cookie(
                    'refresh_token',
                    $cookieToken,
                    60*24*7,
                    '/',
                    $isProd ? config('jwt.cookie.domain.prod') : null,
                    $isProd,
                    true,
                    false,
                    $isProd ? 'None' : 'Lax'
                );
        } else {
            return response()->json($structure, $code);
        }
    }
}
