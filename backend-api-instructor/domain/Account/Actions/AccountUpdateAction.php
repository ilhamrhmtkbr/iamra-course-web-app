<?php

namespace Domain\Account\Actions;

use Domain\Account\Requests\AccountUpdateRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorAccount;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class AccountUpdateAction
{
    public function __invoke(AccountUpdateRequest $request): string
    {
        try {
            $instructorAccount = InstructorAccount::where('instructor_id', auth()->user()->getAuthIdentifier())->first();

            Gate::authorize('update', $instructorAccount);

            [
                'account_id' => $account_id,
                'bank_name' => $bank_name,
                'alias_name' => $alias_name
            ] = $request->validated();

            $data = [
                'name' => auth()->user()->full_name,
                'account' => $account_id,
                'bank' => $bank_name,
                'alias_name' => $alias_name,
                'email' => auth()->user()->getAuthIdentifier(),
            ];

            $response = Http::midTransCreator()
                ->patch("/api/v1/beneficiaries/" . $instructorAccount->alias_name, $data);

            if ($response->status() != 200) {
                throw new \Exception($response, 400);
            }

            $instructorAccount->account_id = $data['account'];
            $instructorAccount->bank_name = $data['bank'];
            $instructorAccount->alias_name = $data['alias_name'];
            $instructorAccount->save();

            return ResponseApiHelper::send(Lang::get('request-instructor.account_upsert_success'), Response::HTTP_OK, $alias_name);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }

}
