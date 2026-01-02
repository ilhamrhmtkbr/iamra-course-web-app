<?php

namespace Domain\Lessons\Actions;

use Domain\Lessons\Redis\StudentStudiesCache;
use Domain\Lessons\Requests\LessonUpdateRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorLesson;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class LessonUpdateAction
{
    public function __invoke(LessonUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $instructorLesson = InstructorLesson::getByInstructorId($data['instructor_section_id'], auth()->user()->getAuthIdentifier())
                ->where('id', $data['id'])->first();

            Gate::authorize('update', $instructorLesson);

            $instructorLesson->instructor_section_id = $data['instructor_section_id'];
            $instructorLesson->title = $data['title'];
            $instructorLesson->description = $data['description'];
            $instructorLesson->code = base64_encode($data['code']);
            $instructorLesson->order_in_section = $data['order_in_section'];
            $instructorLesson->save();

            StudentStudiesCache::deleteLesson($data['id']);
            return ResponseApiHelper::send(Lang::get('request-success.update_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
