<?php

namespace Domain\Courses\Actions;

use Domain\Courses\Redis\PublicCoursesCache;
use Domain\Courses\Requests\CourseStoreRequest;
use Domain\Shared\Helpers\ImageCompressHelper;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourse;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CourseStoreAction
{
    public function __invoke(CourseStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();

            $recentCourse = InstructorCourse::where('instructor_id', auth()->user()->getAuthIdentifier())
                ->where('title', $data['title'])
                ->select(['instructor_id', 'title'])
                ->first();

            if ($recentCourse) {
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }

            $course = new InstructorCourse();
            $course->id = Str::uuid();
            $course->instructor_id = auth()->user()->getAuthIdentifier();
            $course->title = $data['title'];
            $course->description = $data['description'];
            $course->price = $data['price'];
            $course->level = $data['level'];
            $course->status = $data['status'];
            $course->visibility = $data['visibility'];
            $course->editor = $data['editor'];
            $course->notes = $data['notes'];
            $course->requirements = $data['requirements'];

            $courseImage = ImageCompressHelper::doIt($course->id, $data['image'], 'instructor-course-images');
            $course->image = $courseImage;

            $course->save();
            PublicCoursesCache::deleteAll();
            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
