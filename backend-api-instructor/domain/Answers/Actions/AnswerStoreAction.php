<?php

namespace Domain\Answers\Actions;

use Domain\Answers\Requests\AnswerStoreRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorAnswer;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class AnswerStoreAction
{
    public function __invoke(AnswerStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            [
                'student_question_id' => $student_question_id,
                'answer' => $answer
            ] = $request->validated();

            if (InstructorAnswer::where('instructor_id', auth()->user()->getAuthIdentifier())
                ->where('student_question_id', $student_question_id)->exists()) {
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }

            $instructorAnswer = new InstructorAnswer();
            $instructorAnswer->instructor_id = auth()->user()->getAuthIdentifier();
            $instructorAnswer->student_question_id = $student_question_id;
            $instructorAnswer->answer = $answer;
            $instructorAnswer->save();

            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }

}
