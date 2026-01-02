<?php

namespace Domain\Auth\Actions;

use Domain\Shared\Enum\UserRole;
use Domain\Shared\Models\Instructor;
use Domain\Shared\Models\Student;
use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class MeAction
{
    public function __invoke(): \Illuminate\Http\JsonResponse
    {
        $user = auth()->user();
        $payload = [
            'username' => $user->username,
            'full_name' => $user->full_name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'image' => $user->image,
            'role' => $user->role->value,
            'dob' => $user->dob,
            'address' => $user->address,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ];

        if ($payload['role'] !== UserRole::USER->value) {
            if ($payload['role'] === UserRole::STUDENT->value) {
                $additionalData = Student::where('user_id', $payload['username'])
                    ->select(['category', 'summary'])
                    ->first();
                $payload['category'] = $additionalData->category;
                $payload['summary'] = $additionalData->summary;
            } elseif ($payload['role'] === UserRole::INSTRUCTOR->value) {
                $additionalData = Instructor::where('user_id', $payload['username'])
                    ->select(['resume', 'summary'])
                    ->first();
                $payload['resume'] = $additionalData->resume;
                $payload['summary'] = $additionalData->summary;
            }
        }

        return ResponseApiHelper::send(
            Lang::get('request-success.get_data_successfully'),
            Response::HTTP_OK,
            $payload
        );
    }
}
