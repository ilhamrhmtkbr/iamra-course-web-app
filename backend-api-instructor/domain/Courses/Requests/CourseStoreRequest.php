<?php

namespace Domain\Courses\Requests;

use Domain\Shared\Enum\InstructorCourseEditor;
use Domain\Shared\Enum\InstructorCourseLevel;
use Domain\Shared\Enum\InstructorCourseStatus;
use Domain\Shared\Enum\InstructorCourseVisibility;
use Domain\Shared\Rules\NoProfanity;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Enum;
use Symfony\Component\HttpFoundation\Response;

class CourseStoreRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:100', new NoProfanity()],
            'description' => ['required', 'string', 'min:3', 'max:325', new NoProfanity()],
            'image' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'level' => ['required', new Enum(InstructorCourseLevel::class)],
            'status' => ['required', new Enum(InstructorCourseStatus::class)],
            'visibility' => ['required', new Enum(InstructorCourseVisibility::class)],
            'notes' => ['nullable', 'string', 'min:3', 'max:150', new NoProfanity()],
            'requirements' => ['nullable', 'string', 'min:3', 'max:325', new NoProfanity()],
            'editor' => ['required', 'string', 'min:1', 'max:45', new NoProfanity(), new Enum(InstructorCourseEditor::class)]
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
