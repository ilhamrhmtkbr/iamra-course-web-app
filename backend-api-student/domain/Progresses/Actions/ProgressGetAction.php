<?php

namespace Domain\Progresses\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\StudentCourseProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class ProgressGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = StudentCourseProgress::where('student_id', auth()->user()->getAuthIdentifier())
                ->with(['instructorCourse' => function ($query) {
                    $query->select(['id', 'title'])
                        ->with(['sections:id,instructor_course_id']);
                }])
                ->paginate(10);

            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $data);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, 500);
        }
    }
}
