<?php

namespace Domain\Auth\Actions;

use Domain\Auth\Exceptions\DataConflictException;
use Domain\Auth\Requests\RegisterRequest;
use Domain\Shared\Models\User;
use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class RegisterAction
{
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        try {
            $captcha = new CaptchaAction();
            $captcha($request->captcha);

            ['username' => $username] = $request->validated();
            $user = User::where('username', $username)->select(['username'])->first();

            if ($user) {
                throw new DataConflictException(Lang::get('request-auth.registered_failed_conflict'));
            }

            $newUser = new User();
            $newUser->full_name = "{$request['first_name']} {$request['middle_name']} {$request['last_name']}";
            $newUser->username = $username;
            $newUser->password = Hash::make($request['password']);
            $newUser->save();

            return ResponseApiHelper::send(
                Lang::get('request-auth.login_success'),
                Response::HTTP_OK,
                cookieToken: LoginAction::generateJwt($newUser)
            );
        } catch (DataConflictException $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
