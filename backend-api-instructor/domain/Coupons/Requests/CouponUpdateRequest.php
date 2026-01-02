<?php

namespace Domain\Coupons\Requests;

use Domain\Shared\Rules\NoProfanity;
use Domain\Shared\Rules\ValidFutureDate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class CouponUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required'],
            'discount' => ['required', 'numeric', 'digits_between:1,3', 'between:1,100', new NoProfanity()],
            'max_redemptions' => ['required', 'numeric', 'digits_between:1,3', 'between:1,100', new NoProfanity()],
            'expiry_date' => ['required', 'date', new ValidFutureDate()]
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
