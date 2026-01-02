<?php

namespace Domain\Earnings\Actions;

use Domain\Shared\Enum\InstructorEarningStatus;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorAccount;
use Domain\Shared\Models\InstructorEarning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EarningPayoutAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            if (!InstructorAccount::where('instructor_id', auth()->user()->getAuthIdentifier())->exists()) {
                throw new \Exception(Lang::get('request-instructor.earning_payout_failed_no_account'), Response::HTTP_BAD_REQUEST);
            }

            $instructorEarning = InstructorEarning::whereHas('instructorCourse', function ($query) {
                $query->where('instructor_id', auth()->user()->getAuthIdentifier());
            })->where('status', InstructorEarningStatus::SETTLEMENT);

            if ($instructorEarning->sum('amount') === 0) {
                throw new \Exception(Lang::get('request-instructor.earning_payout_failed_no_income'), Response::HTTP_BAD_REQUEST);
            }

            $instructorAccount = InstructorAccount::where('instructor_id', auth()->user()->getAuthIdentifier())->first();

            $res = Http::midTransCreator()->post("/api/v1/payouts", [
                "payouts" => [
                    [
                        'beneficiary_name' => auth()->user()->getAuthIdentifier(),
                        'beneficiary_account' => intval($instructorAccount->account_id),
                        'beneficiary_bank' => $instructorAccount->bank_name,
                        'beneficiary_email' => auth()->user()->email,
                        'amount' => strval($instructorEarning->sum('amount')),
                        'notes' => 'Payout ' . date('d m Y \a\t h i A'),
                    ]
                ]
            ]);

            if (!$res->created()) {
                Log::info($res->json(), ['create']);

                throw new \Exception($res->json(), Response::HTTP_BAD_REQUEST);
            } else {
                $reference = $res->json('payouts');

                $approve = Http::midTransApprove()->post("/api/v1/payouts/approve", [
                    'reference_nos' => [$reference[0]['reference_no']],
                ]);

                if (!$approve->accepted()) {
                    Log::info($approve->json(), ['appr']);

                    throw new \Exception($approve->json(), Response::HTTP_BAD_REQUEST);
                }
            }

            $instructorEarning->update([
                'status' => 'accepted'
            ]);

            return ResponseApiHelper::send(Lang::get('request-instructor.earning_payout_success'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
