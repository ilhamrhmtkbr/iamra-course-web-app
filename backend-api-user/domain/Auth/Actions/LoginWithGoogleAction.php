<?php

namespace Domain\Auth\Actions;

use Domain\Shared\Models\User;
use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class LoginWithGoogleAction
{
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $captcha = new CaptchaAction();
            $captcha($request->captcha);

            $valid = validator(
                ['email' => $request->email],
                ['email' => 'required|email']
            )->validate();

            ['email' => $email] = $valid;
            $makesUsername = explode('@', $email);

            $user = User::where('email', $email)
                ->select(['username', 'full_name'])
                ->first();

            if ($user == null) {
                $user = new User();
                $user->username = strrev($makesUsername[0]);
                $user->password = Hash::make('User123!');
                $user->email = $email;
                $user->email_verified_at = now();
                $user->full_name = $email;
                $user->save();
            }

            return ResponseApiHelper::send(
                Lang::get('request-auth.login_success'),
                Response::HTTP_OK,
                cookieToken: LoginAction::generateJwt($user)
            );
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
