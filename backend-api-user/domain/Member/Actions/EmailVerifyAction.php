<?php

namespace Domain\Member\Actions;

use Carbon\Carbon;
use Domain\Member\Events\EmailVerifyEvent;
use Domain\Shared\Models\User;
use Symfony\Component\HttpFoundation\Response;

class EmailVerifyAction
{
    public function __invoke(string $id, string $hash)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                abort(404, 'User not found');
            }

            if (sha1($user->email) !== $hash) {
                abort(403, 'Invalid verification link');
            }

            $message = 'Your email has been successfully verified. Please reopen this application on the platform you are using, such as web or android.';

            if ($user->email_verified_at !== null) {
                $message = 'User has been verified';
                abort(Response::HTTP_BAD_REQUEST, 'User has been verified');
            }

            $user->email_verified_at = Carbon::now();
            $user->save();

            broadcast(new EmailVerifyEvent($user->username));

            return response()->view('member-email-verify', [
                'message' => $message
            ]);
        } catch (\Exception $e) {

            return response()->view('member-email-verify', ['message' => 'Failed']);
        }
    }
}
