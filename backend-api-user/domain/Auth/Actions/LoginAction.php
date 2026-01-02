<?php

namespace Domain\Auth\Actions;

use Domain\Auth\Requests\LoginRequest;
use Domain\Shared\Models\User;
use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginAction
{
    public function __invoke(LoginRequest $request): ?JsonResponse
    {
        try {
            $data = DB::connection('mysql')
                ->table('users')
                ->get();

            $captcha = new CaptchaAction();
            $captcha($request->captcha);

            ['username' => $username, 'password' => $password] = $request->validated();

            $user = User::where('username', $username)
                ->select(['username', 'password', 'full_name', 'role'])
                ->first();

            if ($user === null || !password_verify($password, $user->password)) {
                throw new \Exception(Lang::get('request-auth.login_failed'), Response::HTTP_UNAUTHORIZED);
            }

            return ResponseApiHelper::send(
                Lang::get('request-auth.login_success'),
                Response::HTTP_OK,
                cookieToken: self::generateJwt($user)
            );
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, Response::HTTP_UNAUTHORIZED);
        }
    }

    public static function generateJwt(User $user): ?string
    {
        $payload = [
            'sub' => $user->username,
            'full_name' => $user->full_name,
        ];

        return JWTAuth::claims($payload)->fromUser($user);
    }
}
