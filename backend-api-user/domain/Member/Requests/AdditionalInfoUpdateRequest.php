<?php

namespace Domain\Member\Requests;

use Domain\Shared\Rules\NoProfanity;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class AdditionalInfoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:2', 'max:33', new NoProfanity()],
            'middle_name' => ['required', 'string', 'min:2', 'max:33', new NoProfanity()],
            'last_name' => ['required', 'string', 'min:2', 'max:33', new NoProfanity()],
            'image' => ['nullable', 'string', 'regex:/^data:image\/(jpeg|png|jpg|gif|svg|webp);base64,/', 'max:3000000'],
            'dob' => ['required', 'date'],
            'address' => ['required', 'string', 'min:10', 'max:100', new NoProfanity()]
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
