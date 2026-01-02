<?php

namespace Domain\Auth\Actions;

use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutAction
{
    public function __invoke(): JsonResponse
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        $isProd = app()->environment('production');

        $domain = $isProd
            ? config('jwt.cookie.domain.prod')
            : config('jwt.cookie.domain.dev');

        return response()->json(['success' => true])
            ->cookie('access_token', '', -1, '/', $domain, $isProd, $isProd, false, $isProd ? 'Strict' : 'Lax')
            ->cookie('refresh_token', '', -1, '/', $domain, $isProd, $isProd, false, $isProd ? 'Strict' : 'Lax');
    }
}

