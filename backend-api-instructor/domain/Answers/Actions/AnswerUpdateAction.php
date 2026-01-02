<?php

namespace Domain\Answers\Actions;
use Domain\Answers\Requests\AnswerUpdateRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorAnswer;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class AnswerUpdateAction
{
    public function __invoke(AnswerUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $instructorAnswer = InstructorAnswer::findOrFail($request->id);
            Gate::authorize('update', $instructorAnswer);
            [ 'answer' => $answer ] = $request->validated();
            $instructorAnswer->answer = $answer;
            $instructorAnswer->save();

            return ResponseApiHelper::send(Lang::get('request-success.update_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
