<?php

namespace Domain\Reviews\Requests;

use Domain\Shared\Rules\NoProfanity;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class CourseReviewStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'instructor_course_id' => ['required', 'string', 'uuid'],
            'review' => ['required', 'string', 'min:10', 'max:300', new NoProfanity()],
            'rating' => ['required', 'numeric', 'min:1', 'max:10']
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
