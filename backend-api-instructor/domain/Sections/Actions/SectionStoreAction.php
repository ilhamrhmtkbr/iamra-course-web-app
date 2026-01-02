<?php

namespace Domain\Sections\Actions;

use Domain\Sections\Requests\SectionStoreRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourse;
use Domain\Shared\Models\InstructorSection;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class SectionStoreAction
{
    public function __invoke(SectionStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();

            if (!InstructorCourse::where('id', $data['instructor_course_id'])
                ->where('instructor_id', auth()->user()->getAuthIdentifier())->exists()) {
                throw new \Exception(Lang::get('request-instructor.section_insert_failed_no_access'), Response::HTTP_NOT_FOUND);
            }

            if (InstructorSection::getByInstructor(auth()->user()->getAuthIdentifier())->where('title', $data['title'])->exists()) {
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }

            $instructorSection = new InstructorSection();
            $instructorSection->instructor_course_id = $data['instructor_course_id'];
            $instructorSection->title = $data['title'];
            $instructorSection->order_in_course = $data['order_in_course'];
            $instructorSection->save();

            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
