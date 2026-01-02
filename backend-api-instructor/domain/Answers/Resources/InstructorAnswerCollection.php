<?php

namespace Domain\Answers\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InstructorAnswerCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => InstructorAnswerResource::collection($this->collection)
        ];
    }
}



