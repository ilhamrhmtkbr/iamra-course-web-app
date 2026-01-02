<?php

namespace Domain\Courses\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class CourseLikesGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = InstructorCourse::where('instructor_id', auth()->user()->getAuthIdentifier())->first()?->likedByUser;
            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $data);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
