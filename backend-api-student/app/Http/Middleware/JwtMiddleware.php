<?php

namespace App\Http\Middleware;

use Closure;
use Domain\Shared\Enum\UserRole;
use Domain\Shared\Models\User;
use Exception;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $token = $request->cookie('access_token');

            if (!$token) {
                return response()->json([
                    'message' => 'Access token not provided'
                ], Response::HTTP_UNAUTHORIZED);
            }

            $payload = JWT::decode($token, new Key(config('jwt.secret'), 'HS256'));

            $user = User::where('username', $payload->sub)
                ->select([
                    'username',
                    'full_name',
                    'email',
                    'email_verified_at',
                    'image',
                    'role',
                    'dob',
                    'created_at',
                    'address'
                ])
                ->first();

            if (!$user) {
                return response()->json([
                    'message' => 'User not found'
                ], Response::HTTP_UNAUTHORIZED);
            }

            if ($user->role->value !== UserRole::STUDENT->value) {
                return response()->json([
                    'message' => 'Access denied: Student role required'
                ], Response::HTTP_FORBIDDEN);
            }

            if ($user->email_verified_at === null) {
                return response()->json([
                    'message' => 'Email verification required'
                ], Response::HTTP_FORBIDDEN);
            }

            auth()->setUser($user);
            $request->setUserResolver(fn () => $user);
        } catch (ExpiredException $e) {
            Log::warning('❌ JWT Token Expired', [
                'error' => $e->getMessage(),
                'token_length' => strlen($token ?? ''),
            ]);
            return response()->json([
                'message' => 'Token has expired'
            ], Response::HTTP_UNAUTHORIZED);

        } catch (SignatureInvalidException $e) {
            Log::warning('❌ JWT Invalid Signature', [
                'error' => $e->getMessage(),
                'token_length' => strlen($token ?? ''),
            ]);
            return response()->json([
                'message' => 'Invalid token signature'
            ], Response::HTTP_UNAUTHORIZED);

        } catch (Exception $e) {
            Log::error('❌ JWT Middleware Exception', [
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'token_exists' => !empty($token),
                'token_length' => $token ? strlen($token) : 0,
            ]);
            return response()->json([
                'message' => 'Invalid token',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
