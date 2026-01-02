<?php

namespace Domain\Reviews\Actions;

use Domain\Shared\Enum\InstructorEarningStatus;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Reviews\Requests\CourseReviewStoreRequest;
use Domain\Shared\Models\InstructorCourseReview;
use Domain\Shared\Models\InstructorEarning;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class ReviewStoreAction
{
    public function __invoke(CourseReviewStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $studentId = auth()->user()->getAuthIdentifier();
            $studentSettlementCourse = InstructorEarning::isStudentPaid($studentId, $data['instructor_course_id'])->exists();
            if (!$studentSettlementCourse) {
                throw new \Exception(Lang::get('request-student.section_get_failed'), Response::HTTP_BAD_REQUEST);
            }


            if(InstructorCourseReview::where('student_id', $studentId)
                ->where('review', $data['review'])->exists()) {
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }

            $courseReview = new InstructorCourseReview();
            $courseReview->student_id = $studentId;
            $courseReview->instructor_course_id = $data['instructor_course_id'];
            $courseReview->review = $data['review'];
            $courseReview->rating = $data['rating'];
            $courseReview->save();
            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
