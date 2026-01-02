<?php

namespace App\Actions;

use App\Models\InstructorCourse;
use Illuminate\Http\Request;

class CourseGetAction
{
    public function __invoke(Request $request): \App\Resources\PublicCourseCollection
    {
        $keyword = $request->keyword;
        $page = $request->page ?? 1;
        $sort = $request->order_by ?? 'desc';
        $level = $request->level ?? 'all';
        $status = $request->status ?? 'all';

        if ($keyword) {
            $data = InstructorCourse::where('title', 'like', '%' . $keyword . '%')
                ->with(['instructor' => function ($query) {
                    $query->select(['user_id'])
                        ->with(['user' => function ($query) {
                            $query->select(['username', 'full_name']);
                        }]);
                }])
                ->select(['id', 'title', 'image', 'price', 'editor', 'instructor_id'])
                ->paginate(4);
        } else {
            $data = \App\Redis\PublicCoursesCache::all($level, $status, $sort, $page);
        }

        return new \App\Resources\PublicCourseCollection($data);
    }
}
