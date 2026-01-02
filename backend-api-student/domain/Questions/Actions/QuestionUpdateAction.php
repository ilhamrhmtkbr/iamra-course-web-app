<?php

namespace Domain\Questions\Actions;

use Domain\Shared\Enum\InstructorEarningStatus;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Questions\Requests\QuestionUpdateRequest;
use Domain\Shared\Models\InstructorEarning;
use Domain\Shared\Models\StudentQuestion;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class QuestionUpdateAction
{
    public function __invoke(QuestionUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $studentId = auth()->user()->getAuthIdentifier();
            $studentSettlementCourse = InstructorEarning::isStudentPaid($studentId, $data['instructor_course_id'])->exists();
            if (!$studentSettlementCourse) {
                throw new \Exception(Lang::get('request-student.section_get_failed'), Response::HTTP_BAD_REQUEST);
            }
            $studentQuestion = StudentQuestion::findOrFail($data['id']);
            Gate::authorize('update', $studentQuestion);
            if(StudentQuestion::where('student_id', $studentId)
                ->whereNot('id', $data['id'])
                ->where('question', $data['question'])
                ->exists()) {
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }
            $studentSettlementCourse = InstructorEarning::where('student_id', $studentId)
                ->where('instructor_course_id', $data['instructor_course_id'])
                ->where('status', InstructorEarningStatus::SETTLEMENT->value)
                ->exists();

            if (!$studentSettlementCourse) {
                throw new \Exception(Lang::get('request-student.section_get_failed'), Response::HTTP_BAD_REQUEST);
            }
            $studentQuestion->question = $data['question'];
            $studentQuestion->save();
            return ResponseApiHelper::send(Lang::get('request-success.update_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
