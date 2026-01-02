<?php

namespace Domain\Transactions\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Enum\InstructorEarningStatus;
use Domain\Shared\Enum\StudentTransactionStatus;
use Domain\Shared\Models\InstructorEarning;
use Domain\Shared\Models\StudentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class TransactionUpdateAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->handle($request);

            return ResponseApiHelper::send(Lang::get('request-success.update_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }

    public function handle(Request $request): void
    {
        $orderId = $request->input('order_id');
        $statusCode = $request->input('status_code');
        $grossAmount = $request->input('gross_amount');
        $signatureKey = $request->input('signature_key');
        $transactionStatus = $request->input('transaction_status');

        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $orderId . $statusCode . $grossAmount . $serverKey);

        if ($hashed !== $signatureKey) {
            throw new \Exception('Wrong Signature Key', 400);
        }
        $instructorEarning = InstructorEarning::where('order_id', $orderId)->first();

        if ($transactionStatus === StudentTransactionStatus::SETTLEMENT->value &&
            $instructorEarning->status->value !== InstructorEarningStatus::SETTLEMENT->value) {
            $instructorEarning->status = InstructorEarningStatus::SETTLEMENT->value;
            $instructorEarning->save();

            $studentTransaction = StudentTransaction::where('order_id', $orderId)->first();
            $studentTransaction->status = StudentTransactionStatus::SETTLEMENT->value;
            $studentTransaction->save();
        }
    }
}
