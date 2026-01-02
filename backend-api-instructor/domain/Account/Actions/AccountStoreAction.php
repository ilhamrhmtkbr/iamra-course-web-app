<?php

namespace Domain\Account\Actions;

use Domain\Account\Requests\AccountStoreRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorAccount;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class AccountStoreAction
{
    public function __invoke(AccountStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $exists = InstructorAccount::where('instructor_id', auth()->user()->getAuthIdentifier())->exists();

            if ($exists) {
                throw new \Exception(Lang::get('request-instructor.account_upsert_failed_conflict'), Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            [
                'account_id' => $account_id,
                'bank_name' => $bank_name,
                'alias_name' => $alias_name
            ] = $request->validated();

            $beneficiary = [
                'name' => auth()->user()->full_name,
                'account' => $account_id,
                'bank' => $bank_name,
                'alias_name' => $alias_name,
                'email' => auth()->user()->email,
            ];

            $response = Http::midTransCreator()->post('/api/v1/beneficiaries', $beneficiary);
            if (!$response->created()) {
                throw new \Exception($response, 400);
            }

            InstructorAccount::create([
                'instructor_id' => auth()->user()->getAuthIdentifier(),
                'account_id' => $beneficiary['account'],
                'bank_name' => $beneficiary['bank'],
                'alias_name' => $beneficiary['alias_name'],
            ]);

            return ResponseApiHelper::send(Lang::get('request-instructor.account_upsert_success'), Response::HTTP_CREATED, $alias_name);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
