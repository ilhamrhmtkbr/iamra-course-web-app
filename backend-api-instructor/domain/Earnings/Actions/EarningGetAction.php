<?php

namespace Domain\Earnings\Actions;

use Domain\Earnings\Resources\InstructorEarningCollection;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorEarning;
use Illuminate\Http\Request;

class EarningGetAction
{
    public function __invoke(Request $request): InstructorEarningCollection|\Illuminate\Http\JsonResponse
    {
        try {
            $sort = $request->query('sort', 'desc');
            $instructorEarning = InstructorEarning::getByInstructor(auth()->user()->getAuthIdentifier())
                ->orderBy('created_at', $sort)
                ->paginate(10);

            return new InstructorEarningCollection($instructorEarning);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
