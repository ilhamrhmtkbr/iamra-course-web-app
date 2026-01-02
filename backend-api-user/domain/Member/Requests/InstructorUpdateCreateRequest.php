<?php

namespace Domain\Member\Requests;

use Domain\Shared\Enum\UserRole;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Enum;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class InstructorUpdateCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        $role = JWTAuth::user()->role->value;

        if ($role == UserRole::USER->value) {
            return true;
        } elseif ($role == UserRole::INSTRUCTOR->value) {
            return true;
        }
        return false;
    }

    public function rules(): array
    {
        return [
            'role' => ['required', new Enum(UserRole::class)],
            'resume' => ['nullable', 'file', 'max:2048'],
            'summary' => ['nullable', 'string', 'min:10']
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
