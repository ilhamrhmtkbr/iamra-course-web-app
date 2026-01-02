<?php

namespace Domain\Member\Actions;

use Domain\Shared\Models\InstructorCourse;
use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;

class CourseLikeUpdateAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            ['id' => $courseId] = $request->validate(['id' => 'required']);

            $user = auth()->user();

            $courseQuery = InstructorCourse::where('id', $courseId);

            if ($courseQuery->doesntExist()) {
                throw new \Exception(Lang::get('request-member.course_like_failed_course_not_found'), Response::HTTP_NOT_FOUND);
            }

            $course = $courseQuery->select(['id'])->first();

            if ($user->likedCourses()->where('id', $course->id)->exists()) {
                $user->likedCourses()->detach($course->id);
            } else {
                $user->likedCourses()->attach($course->id);
            }
            return ResponseApiHelper::send(
                Lang::get('request-member.course_like_success'),
                \Symfony\Component\HttpFoundation\Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
