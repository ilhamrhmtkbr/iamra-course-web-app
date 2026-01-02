<?php

namespace Domain\Lessons\Actions;

use Domain\Lessons\Redis\StudentStudiesCache;
use Domain\Lessons\Requests\LessonStoreRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorLesson;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class LessonStoreAction
{
    public function __invoke(LessonStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();

            if (InstructorLesson::getByInstructorId($data['instructor_section_id'], auth()->user()->getAuthIdentifier())
                ->where('title', $data['title'])->exists()) {
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }

            $instructorLesson = new InstructorLesson();
            $instructorLesson->instructor_section_id = $data['instructor_section_id'];
            $instructorLesson->title = $data['title'];
            $instructorLesson->description = $data['description'];
            $instructorLesson->code = base64_encode($data['code']);
            $instructorLesson->order_in_section = $data['order_in_section'];
            $instructorLesson->save();

            StudentStudiesCache::deleteLesson($instructorLesson->instructor_section_id);

            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
