<?php

namespace Domain\Lessons\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructorLessonResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'instructor_section_id' => $this->instructor_section_id,
            'title' => $this->title,
            'description' => $this->description,
            'code' => json_encode(base64_decode($this->code)),
            'order_in_section' => $this->order_in_section,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
