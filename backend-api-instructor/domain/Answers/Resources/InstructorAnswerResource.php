<?php

namespace Domain\Answers\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructorAnswerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $studentQuestion = $this->studentQuestion ?? null;

        return [
            'student_full_name' => $studentQuestion->student->user->full_name ?? null,
            'course_title' => $studentQuestion->instructorCourse->title ?? null,
            'question' => $studentQuestion->question,
            'answer' => $this->answer,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
