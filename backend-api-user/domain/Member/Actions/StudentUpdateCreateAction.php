<?php

namespace Domain\Member\Actions;

use Domain\Auth\Actions\LoginAction;
use Domain\Shared\Enum\UserRole;
use Domain\Shared\Models\Student;
use Domain\Member\Requests\StudentUpdateStoreRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class StudentUpdateCreateAction
{
    public function __invoke(StudentUpdateStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();

            $user = auth()->user();
            $roleName = $data['role'];

            if ($roleName == UserRole::STUDENT->value) {

                Student::updateOrCreate(['user_id' => $user->username], [
                    'category' => $data['category'],
                    'summary' => $data['summary']
                ]);

                if ($user->role != UserRole::STUDENT->value) {
                    $user->role = UserRole::STUDENT->value;
                }

                $user->save();

                JWTAuth::invalidate(JWTAuth::getToken());
            } else {
                throw new \Exception(Lang::get('request-exception.select_the_options_provided'), Response::HTTP_UNPROCESSABLE_ENTITY);
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
