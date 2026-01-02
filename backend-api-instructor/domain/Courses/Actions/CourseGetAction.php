<?php

namespace Domain\Courses\Actions;

use Domain\Courses\Resources\InstructorCourseCollection;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourse;
use Illuminate\Http\Request;

class CourseGetAction
{
    public function __invoke(Request $request): InstructorCourseCollection|\Illuminate\Http\JsonResponse
    {
        try {
            $sort = $request->query('sort', 'desc');
            $data = InstructorCourse::where('instructor_id', auth()->user()->getAuthIdentifier())
                ->select(['id', 'title', 'image', 'description', 'editor', 'created_at', 'updated_at'])
                ->orderBy('created_at', $sort)
                ->paginate(4);
            return new InstructorCourseCollection($data);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getMessage());
        }
    }
}
