<?php

namespace Domain\Member\Actions;

use Dflydev\DotAccessData\Exception\DataException;
use Domain\Auth\Actions\LoginAction;
use Domain\Shared\Enum\UserRole;
use Domain\Shared\Models\Instructor;
use Domain\Member\Requests\InstructorUpdateCreateRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class InstructorUpdateCreateAction
{
    public function __invoke(InstructorUpdateCreateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();

            $user = auth()->user();
            $username = $user->username;
            $roleName = $data['role'];

            if ($roleName == UserRole::INSTRUCTOR->value) {
                $file = $request->file('resume');
                $fileName = Str::uuid() . '.pdf';

                $oldResume = Instructor::where('user_id', $user->username)
                    ->select(['user_id', 'resume'])
                    ->first();

                if ($oldResume?->resume != null) {
                    Storage::disk('local')->delete('user-resume/' . $oldResume->resume);
                }

                $file?->storeAs('user-resume', $fileName);

                Instructor::updateOrCreate(['user_id' => $username], [
                    'resume' => $fileName ?? '',
                    'summary' => $data['summary'] ?? ''
                ]);

                if ($user->role->value != UserRole::INSTRUCTOR->value) {
                    $user->role = UserRole::INSTRUCTOR->value;
                }

                $user->save();

                JWTAuth::invalidate(JWTAuth::getToken());
            } else {
                throw new DataException(Lang::get('request-exception.select_the_options_provided'), Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            return ResponseApiHelper::send(
                Lang::get('request-member.role_register_success') . $data['role'],
                Response::HTTP_CREATED,
                cookieToken: LoginAction::generateJwt($user)
            );
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
