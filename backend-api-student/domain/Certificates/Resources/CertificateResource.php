<?php

namespace Domain\Certificates\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course' => [
                'id' => $this->instructorCourse->id,
                'title' => $this->instructorCourse->title,
                'description' => $this->instructorCourse->description,
                'image' => $this->instructorCourse->image,
                'price' => $this->instructorCourse->price,
                'level' => $this->instructorCourse->level,
                'sections' => $this->instructorCourse->sections
            ],
            'created_at' => $this->created_at,
            'instructor' => $this->instructorCourse->instructor->user->full_name
        ];
    }
}
