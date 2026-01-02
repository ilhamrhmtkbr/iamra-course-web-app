<?php

namespace Domain\Member\Requests;

use Domain\Shared\Rules\NoProfanity;
use Domain\Shared\Enum\UserRole;
use Domain\Shared\Enum\StudentCategory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Enum;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class StudentUpdateStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        $role = JWTAuth::user()->role->value;

        if ($role == UserRole::USER->value) {
            return true;
        } elseif ($role == UserRole::STUDENT->value) {
            return true;
        }
        return false;
    }

    public function rules(): array
    {
        return [
            'role' => ['required', new Enum(UserRole::class)],
            'category' => ['required', new Enum(StudentCategory::class)],
            'summary' => ['required', 'string', 'min:10', new NoProfanity()]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
