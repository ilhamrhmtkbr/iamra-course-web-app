<?php

namespace Domain\Coupons\Requests;

use Domain\Shared\Rules\NoProfanity;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class CouponStoreRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'instructor_course_id' => ['required', 'string', 'min:32', 'max:36', new NoProfanity()],
            'discount' => ['required', 'numeric', 'digits_between:1,2', 'between:1,99', new NoProfanity()],
            'max_redemptions' => ['required', 'numeric', 'digits_between:1,3', 'between:1,100', new NoProfanity()],
            'expiry_date' => ['required', 'date']
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
