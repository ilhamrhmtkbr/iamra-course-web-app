<?php

namespace Domain\Member\Actions;

use Domain\Auth\Actions\LoginAction;
use Domain\Shared\Models\User;
use Domain\Member\Requests\AuthenticationUpdateRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class UpdateAuthenticationAction
{
    public function __invoke(AuthenticationUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();

            $user = auth()->user();

            $hashOldPassword = $user->password;
            $oldPasswordInput = $data['old_password'];
            $newPasswordInput = $data['new_password'] ?? null;

            if ($user->username != $data['username'] && User::where('username', $data['username'])->doesntExist()) {
                $user->username = $data['username'];
            }

            if (!Hash::check($oldPasswordInput, $hashOldPassword)) {
                throw new \Exception(Lang::get('request-auth.invalid_password'), Response::HTTP_UNAUTHORIZED);
            }

            if ($newPasswordInput != '') {
                if ($newPasswordInput == $oldPasswordInput) {
                    throw new \Exception(Lang::get('request-auth.password_same'), Response::HTTP_UNPROCESSABLE_ENTITY);
                }

                $user->password = Hash::make($newPasswordInput);

            }

            $user->save();

            JWTAuth::invalidate(JWTAuth::getToken());

            return ResponseApiHelper::send(
                Lang::get('request-member.authentication_changed_success') . ' : ' . $user->username,
                Response::HTTP_OK,
                cookieToken: LoginAction::generateJwt($user)
            );
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
