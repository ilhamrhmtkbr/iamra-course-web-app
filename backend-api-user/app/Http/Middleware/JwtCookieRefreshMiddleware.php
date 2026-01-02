<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtCookieRefreshMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        try {
            $token = $request->cookie('refresh_token');
            if (!$token) {
                return response()->json(['message' => 'Token not provided'], Response::HTTP_UNAUTHORIZED);
            }
            JWTAuth::setToken($token);
            $user = JWTAuth::authenticate();
            auth()->setUser($user);
        } catch (TokenExpiredException $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        } catch (JWTException $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
