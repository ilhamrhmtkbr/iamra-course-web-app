<?php

namespace Domain\Courses\Actions;

use Domain\Courses\Redis\PublicCoursesCache;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourse;
use Domain\Shared\Models\StudentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CourseDeleteAction
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
            if (StudentTransaction::where('instructor_course_id', $request->id)->exists()) {
                throw new \Exception(Lang::get('request-instructor.course_updele_failed_student_buy'), Response::HTTP_CONFLICT);
            }
            $instructorCourse = InstructorCourse::findOrFail($request->id);
            Gate::authorize('delete', $instructorCourse);
            $storage = Storage::disk('public');
            if ($storage->exists($instructorCourse->image)) {
                $storage->delete($instructorCourse->image);
            }
            InstructorCourse::where('instructor_id', auth()->user()->getAuthIdentifier())->where('id', $request->id)->delete();
            PublicCoursesCache::deleteAll();
            return ResponseApiHelper::send(Lang::get('request-success.delete_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
