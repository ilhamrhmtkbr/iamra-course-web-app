<?php

namespace Domain\Member\Requests;

use Domain\Shared\Rules\NoProfanity;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'regex:/^[a-z]+$/', 'min:5', 'max:45', new NoProfanity()],
            'old_password' => ['required', Password::min(5)->max(20)->letters()->mixedCase()->numbers()->symbols()],
            'new_password' => ['nullable', Password::min(5)->max(20)->letters()->mixedCase()->numbers()->symbols()]
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
