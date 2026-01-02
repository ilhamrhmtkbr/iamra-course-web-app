<?php

namespace Domain\Earnings\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InstructorEarningCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => InstructorEarningResource::collection($this->collection)
        ];
    }
}
