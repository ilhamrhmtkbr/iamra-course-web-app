<?php

namespace Domain\Sections\Requests;

use Domain\Shared\Rules\NoProfanity;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class SectionStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'instructor_course_id' => ['required', 'string', 'uuid'],
            'title' => ['required', 'string', 'min:5', 'max:100', new NoProfanity()],
            'order_in_course' => ['required', 'numeric', 'min:1', 'max:200']
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
