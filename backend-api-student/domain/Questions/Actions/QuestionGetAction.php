<?php

namespace Domain\Questions\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\StudentQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class QuestionGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $sort = $request->query('sort', 'desc');

            $studentQuestion = StudentQuestion::where('student_id', auth()->user()->getAuthIdentifier())
                ->with(['instructorCourse' => function ($query) {
                    $query->select(['id', 'title']);
                }])->select(['id', 'instructor_course_id', 'question', 'created_at', 'updated_at'])
                ->orderBy('created_at', $sort)
                ->paginate(10);

            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $studentQuestion);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
