<?php

namespace Domain\Socials\Requests;

use Domain\Socials\Rule\InstructorSocialMediaLink;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class SocialStoreRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url_link' => ['required', 'string', 'min:10', 'max:145', new InstructorSocialMediaLink()],
            'display_name' => ['required', 'string', 'min:10', 'max:70']
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
