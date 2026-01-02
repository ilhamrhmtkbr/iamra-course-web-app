<?php

namespace Domain\Answers\Actions;

use Domain\Answers\Resources\InstructorAnswerCollection;
use Domain\Shared\Helpers\PaginateHelper;
use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerGetAction
{
    public function __invoke(Request $request): InstructorAnswerCollection|\Illuminate\Http\JsonResponse
    {
        try {
            $page = $request->get('page', 1);
            $perPage = 4;
            $sort = $request->query('sort', 'desc');
            $instructorId = auth()->user()->getAuthIdentifier();

            $results = DB::connection('mysql')
                ->select("CALL GetInstructorAnswers(?, ?, ?, ?)", [
                    $instructorId,
                    $sort,
                    $page,
                    $perPage
                ]);

            $answersData = PaginateHelper::getPages(
                $results,
                $perPage,
                $page,
                $request->url(),
                $request->query()
            );

            return response()->json($answersData);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getMessage());
        }
    }
}
