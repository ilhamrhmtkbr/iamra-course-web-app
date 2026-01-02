<?php

namespace Domain\Member\Actions;

use Domain\Auth\Actions\LoginAction;
use Domain\Member\Mail\EmailVerify;
use Domain\Member\Mail\EmailVerifyProd;
use Domain\Shared\Models\User;
use Domain\Member\Requests\SetEmailRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class EmailSendAction
{
    public function __invoke(SetEmailRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            ['email' => $email] = $request->validated();

            $user = auth()->user();

            $createdAt = Carbon::parse($user->created_at);
            $minutesPassed = $createdAt->diffInMinutes(now());

            $newToken = false;

            if ($user->email == $email && $user->email_verified_at == null) {
                if ($minutesPassed < 2) {
                    throw new \Exception(Lang::get('request-member.email_update_failed_wait_two_min'), Response::HTTP_UNPROCESSABLE_ENTITY);
                }

                $newToken = self::sendToken($email, $user);
            } else if ($user->email != $email) {
                if (User::select(['username', 'email'])
                    ->where('email', $email)
                    ->where('username', '!=', $user->username)
                    ->first()
                ) {
                    throw new \Exception(Lang::get('request-member.email_update_failed_conflict'), Response::HTTP_CONFLICT);
                }

                $user->email_verified_at = null;
                if ($minutesPassed < 2) {
                    throw new \Exception(Lang::get('request-member.email_update_failed_wait_two_min'), Response::HTTP_UNPROCESSABLE_ENTITY);
                }

                $newToken = self::sendToken($email, $user);
            }

            if ($newToken) {
                return ResponseApiHelper::send(
                    Lang::get('request-member.email_send_verify_link') . ' : ' . $email,
                    Response::HTTP_OK,
                    cookieToken: $newToken
                );
            } else {
                return ResponseApiHelper::send(
                    Lang::get('request-member.email_send_cancel') . ' : ' . $email,
                    Response::HTTP_OK
                );
            }
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }

    public function sendToken(string $email, User $user): string
    {
        $user->email = $email;
        $user->save();

        JWTAuth::invalidate(JWTAuth::getToken());
        $newToken = LoginAction::generateJwt($user);
        $signedUrl = URL::temporarySignedRoute(
            'email.verify',
            now()->addMinutes(30),
            ['id' => $user->username, 'hash' => sha1($user->email)]
        );
        if (app()->environment('production')) {
            Mail::send(new EmailVerifyProd($signedUrl, $user->full_name, $user->email));
        } else {
            Mail::queue(new EmailVerify($signedUrl, $user->full_name, $user->email));
        }
        return $newToken;
    }
}
