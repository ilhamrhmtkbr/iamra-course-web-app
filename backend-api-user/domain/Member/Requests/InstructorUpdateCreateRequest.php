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
        return in_array($role, [UserRole::USER->value, UserRole::INSTRUCTOR->value]);
    }

    public function rules(): array
    {
        return [
            'role' => ['required', new Enum(UserRole::class)],
            'resume' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    // Custom validation untuk RoadRunner
                    if (!$value instanceof \Illuminate\Http\UploadedFile) {
                        $fail('The resume must be a file.');
                        return;
                    }

                    // Check error code
                    if ($value->getError() !== UPLOAD_ERR_OK) {
                        $fail('The resume failed to upload. Error: ' . $value->getError());
                        return;
                    }

                    // Check file exists
                    if (!file_exists($value->getPathname())) {
                        $fail('The resume file does not exist.');
                        return;
                    }

                    // Check size (2MB = 10240 KB)
                    $maxSize = 2 * 1024 * 1024; // 2MB

                    if ($value->getSize() > $maxSize) {
                        $fail('The resume must not be greater than 2MB.');
                    }


                    // ✅ PAKE INI! Jangan bandingin seluruh string!
                    $clientMimeType = $value->getClientMimeType();
                    $extension = strtolower($value->getClientOriginalExtension());
                    
                    // Cek MIME type ATAU extension
                    if ($clientMimeType !== 'application/pdf' && $extension !== 'pdf') {
                        $fail('The resume must be a PDF file.');
                        return;
                    }
                },
            ],
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
