<?php

namespace Domain\Transactions\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\StudentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class TransactionGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $sort = $request->query('sort', 'desc');
            $status = $request->query('status', 'all');

            $studentTransactions = StudentTransaction::where('student_id', auth()->user()->getAuthIdentifier())
                ->when($status !== 'all', function ($query) use ($status) {
                    $query->where('status', $status);
                })->select(['order_id', 'student_id', 'instructor_course_id', 'amount', 'midtrans_data', 'status', 'created_at'])
                ->orderBy('created_at', $sort)
                ->paginate(10);

            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $studentTransactions);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
