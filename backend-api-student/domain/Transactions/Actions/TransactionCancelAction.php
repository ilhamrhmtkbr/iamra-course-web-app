<?php

namespace Domain\Transactions\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Enum\StudentTransactionStatus;
use Domain\Shared\Models\StudentTransaction;
use Domain\Transactions\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class TransactionCancelAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $studentTransaction = StudentTransaction::where('student_id', auth()->user()->getAuthIdentifier())
                ->where('order_id', $request->order_id)
                ->first();
            Gate::authorize('cancel', $studentTransaction);
            $this->handle($studentTransaction);
            return ResponseApiHelper::send(Lang::get('request-success.delete_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }

    public function handle(StudentTransaction $studentTransaction): void
    {
        if ($studentTransaction->status->value === StudentTransactionStatus::SETTLEMENT->value) {
            throw new \Exception(Lang::get('request-student.transaction_delete_failed_has_been_paid'), Response::HTTP_BAD_REQUEST);
        }

        try {
            $midtransService = new MidtransService();
            $res = $midtransService->cancelTransaction($studentTransaction->order_id);
        } catch (\Exception $e) {
            throw new \Exception(Lang::get('request-student.transaction_delete_failed_no_choice_bank'), Response::HTTP_NOT_FOUND);
        }

        $studentTransaction->delete();
    }
}
