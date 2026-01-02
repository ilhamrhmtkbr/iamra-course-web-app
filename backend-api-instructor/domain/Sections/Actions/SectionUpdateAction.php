<?php

namespace Domain\Sections\Actions;

use Domain\Sections\Requests\SectionUpdateRequest;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorSection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SectionUpdateAction
{
    public function __invoke(SectionUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $instructorSection = InstructorSection::getByInstructor(auth()->user()->getAuthIdentifier())
                ->where('id', $data['id'])
                ->where('instructor_course_id', $data['instructor_course_id'])
                ->first();
            Gate::authorize('update', $instructorSection);
            $instructorSection->title = $data['title'];
            $instructorSection->order_in_course = $data['order_in_course'];
            $instructorSection->save();
            return ResponseApiHelper::send(Lang::get('request-success.update_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
