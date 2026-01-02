<?php

namespace Domain\Transactions\Actions;

class TransactionCallbackAction
{
    public function __invoke(): \Illuminate\Http\JsonResponse
    {
        return \response()->json(['success' => true]);
    }
}
