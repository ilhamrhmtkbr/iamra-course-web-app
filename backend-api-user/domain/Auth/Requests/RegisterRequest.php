<?php

namespace Domain\Auth\Requests;

use Domain\Shared\Rules\NoProfanity;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:2', 'max:33', new NoProfanity()],
            'middle_name' => ['required', 'string', 'min:2', 'max:33', new NoProfanity()],
            'last_name' => ['required', 'string', 'min:2', 'max:33', new NoProfanity()],
            'username' => ['required', 'string', 'regex:/^[a-z]+$/', 'min:5', 'max:45', new NoProfanity()],
            'password' => ['required', 'confirmed', Password::min(5)->max(20)->letters()->mixedCase()->numbers()->symbols()]
        ];
    }

    public function messages(): array
    {
        return [
            'username.regex' => 'Username hanya boleh berisi huruf kecil tanpa angka dan simbol.'
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
