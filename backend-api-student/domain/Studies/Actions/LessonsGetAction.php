<?php

namespace Domain\Studies\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Enum\StudentTransactionStatus;
use Domain\Shared\Models\InstructorEarning;
use Domain\Shared\Models\InstructorSection;
use Domain\Studies\Caches\StudiesCache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class LessonsGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $coursesSettled = InstructorEarning::where('student_id', auth()->user()->getAuthIdentifier())
                ->where('status', StudentTransactionStatus::SETTLEMENT->value)
                ->orWhere('status', StudentTransactionStatus::ACCEPTED->value)
                ->pluck('instructor_course_id')->toArray();

            $instructorSection = InstructorSection::findOrFail($request->query('section_id'));

            if (!in_array($instructorSection->instructor_course_id, $coursesSettled)) {
                throw new \Exception(Lang::get('request-student.section_get_failed'), Response::HTTP_BAD_REQUEST);
            }

            $studentLessons = StudiesCache::getLesson($request->query('section_id'), $request->query('page'));

            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $studentLessons);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
