<?php

namespace Domain\Lessons\Resources;

use Domain\lesson\Resources\InstructorLessonResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InstructorLessonCollection extends ResourceCollection
{
    public function toArray(Request $request): InstructorLessonResource
    {
        return new InstructorLessonResource($this->collection);
    }
}
