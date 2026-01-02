<?php

namespace Domain\Auth\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class RefreshAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = JWTAuth::user();
            return ResponseApiHelper::send(
                Lang::get('request-auth.login_success'),
                Response::HTTP_OK,
                cookieToken: LoginAction::generateJwt($user)
            );
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Invalid refresh token'], 401);
        }
    }
}
