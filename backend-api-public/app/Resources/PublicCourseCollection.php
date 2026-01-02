<?php

namespace App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PublicCourseCollection extends ResourceCollection
{

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($course) {
                return [
                    'id' => $course->id,
                    'title' => $course->title,
                    'image' => $course->image,
                    'price' => $course->price,
                    'editor' => $course->editor,
                    'instructor' => $course->instructor->user->full_name
                ];
            })->toArray()
        ];
    }
}
