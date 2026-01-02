<?php

namespace Domain\Questions\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorAnswer;
use Domain\Shared\Models\StudentQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class QuestionDeleteAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required'
            ]);
            if ($validator->fails()) {
                return ResponseApiHelper::send(
                    $validator->errors()->first(),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                );
            }
            $studentQuestion = StudentQuestion::findOrFail($request->id);
            Gate::authorize('delete', $studentQuestion);
            if (InstructorAnswer::where('student_question_id', $request->id)->exists()) {
                throw new \Exception(Lang::get('request-student.question_delete_failed_conflict'), Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $studentQuestion->delete();
            return ResponseApiHelper::send(Lang::get('request-success.delete_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
