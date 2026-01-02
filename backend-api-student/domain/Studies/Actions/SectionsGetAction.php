<?php

namespace Domain\Studies\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Enum\StudentTransactionStatus;
use Domain\Shared\Models\InstructorCourse;
use Domain\Shared\Models\InstructorEarning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class SectionsGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $courseId = $request->query('course_id');

            $coursesSettled = InstructorEarning::where('student_id', auth()->user()->getAuthIdentifier())
                ->where('status', StudentTransactionStatus::SETTLEMENT->value)
                ->orWhere('status', StudentTransactionStatus::ACCEPTED->value)
                ->pluck('instructor_course_id')->toArray();

            if (!in_array($courseId, $coursesSettled)) {
                throw new \Exception(Lang::get('request-student.section_get_failed'),
                    Response::HTTP_BAD_REQUEST);
            }

            $data = InstructorCourse::where('id', $courseId)
                        ->with(['sections:id,instructor_course_id,title'])
                        ->get();

            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $data);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e->getMessage(), 500);
        }
    }
}
