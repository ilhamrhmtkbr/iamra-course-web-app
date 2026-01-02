<?php

namespace Domain\Courses\Actions;

use Domain\Courses\Redis\PublicCoursesCache;
use Domain\Courses\Requests\CourseUpdateRequest;
use Domain\Shared\Helpers\FileSaveHelper;
use Domain\Shared\Helpers\ImageCompressHelper;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CourseUpdateAction
{
    public function __invoke(CourseUpdateRequest $request): \Illuminate\Http\JsonResponse
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

            $instructorCourse = InstructorCourse::findOrFail($request->id);

            Gate::authorize('update', $instructorCourse);

            $courseImage = $instructorCourse->image;

            $data = $request->validated();

            if ($data['image'] != null && preg_match('/^data:image\/(\w+);base64,/', $data['image'])) {
                $oldImage = $instructorCourse->image;
                $storage = Storage::disk(FileSaveHelper::PUBLIC);
                if ($storage->exists($oldImage)) {
                    $storage->delete($oldImage);
                }

                $courseImage = ImageCompressHelper::doIt($instructorCourse->id, $data['image'], 'instructor-course-images');
            }

            $instructorCourse->title = $data['title'];
            $instructorCourse->description = $data['description'];
            $instructorCourse->price = $data['price'];
            $instructorCourse->image = $courseImage;
            $instructorCourse->level = $data['level'];
            $instructorCourse->status = $data['status'];
            $instructorCourse->visibility = $data['visibility'];
            $instructorCourse->editor = $data['editor'];
            $instructorCourse->notes = $data['notes'];
            $instructorCourse->requirements = $data['requirements'];
            $instructorCourse->save();

            PublicCoursesCache::deleteAll();

            return ResponseApiHelper::send(Lang::get('request-success.update_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
