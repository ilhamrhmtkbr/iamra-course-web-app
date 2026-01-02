<?php

namespace Domain\Lessons\Requests;

use Domain\Shared\Rules\NoProfanity;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class LessonUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required'],
            'instructor_section_id' => ['required', 'numeric', 'min:1'],
            'title' => ['required', 'string', 'min:5', 'max:100', new NoProfanity()],
            'description' => ['required', 'string', 'min:15', 'max:200', new NoProfanity()],
            'code' => ['required', 'string', 'min:40', 'max:1000', new NoProfanity()],
            'order_in_section' => ['required', 'numeric', 'min:1', 'max:100']
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
