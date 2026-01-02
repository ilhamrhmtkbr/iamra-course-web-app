<?php

namespace Domain\Courses\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CourseShowAction
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

            $data = InstructorCourse::where('id', $request->id)
                ->where('instructor_id', auth()->user()->getAuthIdentifier())
                ->first();

            if (!$data) {
                return ResponseApiHelper::send(Lang::get('request-exception.data_not_found'), Response::HTTP_NOT_FOUND);
            }

            Gate::authorize('show', $data);

            return ResponseApiHelper::send(Lang::get('request-success.show_data_successfully'), Response::HTTP_OK, $data);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
