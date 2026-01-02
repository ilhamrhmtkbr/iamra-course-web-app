<?php

namespace Domain\Lessons\Actions;

use Domain\Lessons\Redis\StudentStudiesCache;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LessonDeleteAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'instructor_section_id' => 'required'
            ]);
            if ($validator->fails()) {
                return ResponseApiHelper::send(
                    $validator->errors()->first(),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                );
            }
            $instructorLesson = InstructorLesson::getByInstructorId($request->instructor_section_id, auth()->user()->getAuthIdentifier())
                ->where('id', $request->id)->first();

            Gate::authorize('delete', $instructorLesson);
            $instructorLesson->delete();
            StudentStudiesCache::deleteLesson($request->id);
            return ResponseApiHelper::send(Lang::get('request-success.delete_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
