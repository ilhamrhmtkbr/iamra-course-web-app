<?php

namespace Domain\Account\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorAccount;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class AccountShowAction
{
    public function __invoke(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = InstructorAccount::select(['instructor_id', 'account_id', 'bank_name', 'alias_name'])
                ->where('instructor_id', auth()->user()->getAuthIdentifier())->first();

            if (!$data) {
                return ResponseApiHelper::send(Lang::get('request-exception.data_not_found'), Response::HTTP_OK);
            }

            Gate::authorize('view', $data);

            return ResponseApiHelper::send(null, Response::HTTP_OK, $data);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
