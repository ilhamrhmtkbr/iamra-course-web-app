<?php

namespace Domain\Account\Requests;

use Domain\Account\Rules\InstructorAccountMidtransSupportedBanks;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class AccountUpdateRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'account_id' => 'required|numeric|digits_between:6,20',
            'bank_name' => ['required' , new InstructorAccountMidtransSupportedBanks()],
            'alias_name' => 'required|string|between:5,20'
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
