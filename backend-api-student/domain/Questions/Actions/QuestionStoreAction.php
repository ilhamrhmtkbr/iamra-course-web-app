<?php

namespace Domain\Questions\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Questions\Requests\QuestionStoreRequest;
use Domain\Shared\Models\InstructorEarning;
use Domain\Shared\Models\StudentQuestion;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class QuestionStoreAction
{
    public function __invoke(QuestionStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $studentId = auth()->user()->getAuthIdentifier();
            $studentSettlementCourse = InstructorEarning::isStudentPaid($studentId, $data['instructor_course_id'])->exists();
            if (!$studentSettlementCourse) {
                throw new \Exception(Lang::get('request-student.section_get_failed'), Response::HTTP_BAD_REQUEST);
            }
            if(StudentQuestion::where('student_id', $studentId)
                ->where('instructor_course_id', $data['instructor_course_id'])
                ->where('question', $data['question'])
                ->exists()) {
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }
            $studentQuestion = new StudentQuestion();
            $studentQuestion->student_id = $studentId;
            $studentQuestion->instructor_course_id = $data['instructor_course_id'];
            $studentQuestion->question = $data['question'];
            $studentQuestion->save();

            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
