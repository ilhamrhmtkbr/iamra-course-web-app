<?php

namespace Domain\Questions\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class QuestionShowAction
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
            $studentAnswer = DB::connection('mysql')->select("CALL GetStudentQuestion(?, ?)", [$request->id, auth()->user()->getAuthIdentifier()]);

            return ResponseApiHelper::send(Lang::get('request-success.show_data_successfully'), Response::HTTP_OK, $studentAnswer);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
