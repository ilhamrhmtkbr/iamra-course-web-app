<?php

namespace Domain\Studies\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Enum\StudentTransactionStatus;
use Domain\Shared\Models\InstructorCourse;
use Domain\Shared\Models\InstructorEarning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class CoursesGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $coursesSettled = InstructorEarning::where('student_id', auth()->user()->getAuthIdentifier())
                ->where('status', StudentTransactionStatus::SETTLEMENT->value)
                ->orWhere('status', StudentTransactionStatus::ACCEPTED->value)
                ->pluck('instructor_course_id')->toArray();

            $sort = $request->query('sort', 'desc');
            $studentCourses = InstructorCourse::whereIn('id', $coursesSettled)
                ->select(['id', 'title', 'description', 'image', 'created_at'])
                ->orderBy('created_at', $sort)
                ->paginate(10);

            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $studentCourses);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
