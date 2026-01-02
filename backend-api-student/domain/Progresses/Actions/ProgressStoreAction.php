<?php

namespace Domain\Progresses\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Progresses\Requests\CourseProgressStoreRequest;
use Domain\Shared\Models\InstructorEarning;
use Domain\Shared\Models\StudentCourseProgress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class ProgressStoreAction
{
    public function __invoke(CourseProgressStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $studentId = auth()->user()->getAuthIdentifier();
        try {
            ['instructor_course_id' => $courseId,
                'instructor_section_id' => $sectionId,
                'instructor_section_title' => $sectionTitle] = $request->validated();

            $studentSettlementCourse = InstructorEarning::isStudentPaid($studentId, $courseId)->exists();
            if (!$studentSettlementCourse) {
                throw new \Exception(Lang::get('request-student.section_get_failed'), Response::HTTP_BAD_REQUEST);
            }

            $sectionPath = '$."' . $sectionId . '"';

            $exists = (bool)DB::connection('mysql')
                ->selectOne("
                        SELECT EXISTS(
                            SELECT 1 FROM student_course_progresses
                            WHERE JSON_EXTRACT(sections, '{$sectionPath}') = ? AND
                                  instructor_course_id = ? AND
                                  student_id = ?
                        ) AS exist
                    ", [$sectionTitle, $courseId, $studentId])->exist;


            if ($exists) {
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }

            $courseProgress = StudentCourseProgress::where('student_id', $studentId)
                ->where('instructor_course_id', $courseId)
                ->first();

            $sections = [];

            if ($courseProgress) {
                $sections = $courseProgress->sections;
                $sections[$sectionId] = $sectionTitle;
                $courseProgress->sections = $sections;
                $courseProgress->save();
            } else {
                $sections[$sectionId] = $sectionTitle;
                $newCourseProgress = new StudentCourseProgress();
                $newCourseProgress->student_id = $studentId;
                $newCourseProgress->instructor_course_id = $courseId;
                $newCourseProgress->sections = $sections;
                $newCourseProgress->save();
            }

            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, 500);
        }
    }
}
