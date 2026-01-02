<?php

namespace Domain\Courses\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InstructorCourseReviewCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($courseReview){
                return [
                    'course_title' => $courseReview->instructorCourse ? $courseReview->instructorCourse->title : null,
                    'student_full_name' => $courseReview->student && $courseReview->student->user ? $courseReview->student->user->full_name : null,
                    'student_review' => $courseReview->review,
                    'student_rating' => $courseReview->rating,
                    'created_at' => $courseReview->created_at,
                    'updated_at' => $courseReview->updated_at
                ];
            })->toArray()
        ];
    }
}
