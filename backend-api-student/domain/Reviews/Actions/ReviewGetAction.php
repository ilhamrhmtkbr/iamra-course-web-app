<?php

namespace Domain\Reviews\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourseReview;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class ReviewGetAction
{
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $sort = $request->query('sort', 'desc');
            $studentCourseReview = InstructorCourseReview::where('student_id', auth()->user()->getAuthIdentifier());

            if ($request->instructor_course_id) {
                $studentCourseReview->where('instructor_course_id', $request->instructor_course_id);
            }

            $studentCourseReview->with(['instructorCourse' => function($query) {
                $query->select(['id', 'title', 'description']);
            }]);

            $data = $studentCourseReview->orderBy('created_at', $sort)
                ->paginate(5);

            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $data);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
