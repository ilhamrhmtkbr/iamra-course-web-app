<?php

namespace Domain\Reviews\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Reviews\Requests\CourseReviewUpdateRequest;
use Domain\Shared\Models\InstructorCourseReview;
use Domain\Shared\Models\InstructorEarning;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class ReviewUpdateAction
{
    public function __invoke(CourseReviewUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $studentId = auth()->user()->getAuthIdentifier();
            $studentSettlementCourse = InstructorEarning::isStudentPaid($studentId, $data['instructor_course_id'])->exists();
            if (!$studentSettlementCourse) {
                throw new \Exception(Lang::get('request-student.section_get_failed'), Response::HTTP_BAD_REQUEST);
            }

            $courseReview = InstructorCourseReview::where('student_id', $studentId)
                ->where('instructor_course_id', $data['instructor_course_id'])
                ->first();

            $courseReview->review = $data['review'];
            $courseReview->rating = $data['rating'];
            $courseReview->save();

            return ResponseApiHelper::send(Lang::get('request-success.update_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
