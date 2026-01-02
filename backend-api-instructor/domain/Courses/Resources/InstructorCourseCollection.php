<?php

namespace Domain\Courses\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InstructorCourseCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($course) {
                return [
                    'id' => $course->id,
                    'title' => $course->title,
                    'image' => $course->image,
                    'description' => $course->description,
                    'editor' => $course->editor,
                    'created_at' => $course->created_at,
                    'updated_at' => $course->updated_at
                ];
            })->toArray()
        ];
    }
}
