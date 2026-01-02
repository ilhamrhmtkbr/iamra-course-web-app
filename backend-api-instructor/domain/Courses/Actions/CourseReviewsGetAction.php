<?php

namespace Domain\Courses\Actions;

use Domain\Courses\Resources\InstructorCourseReviewCollection;
use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourseReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class CourseReviewsGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse|InstructorCourseReviewCollection
    {
        try {
            $instructorId = auth()->user()->getAuthIdentifier();
            $sort = $request->query('sort', 'desc');

            $data = InstructorCourseReview::whereHas('instructorCourse', function ($query) use ($instructorId) {
                $query->where('instructor_id', $instructorId);
            })
                ->with([
                    'student' => function ($query) {
                        $query->select(['user_id'])->with(['user' => function ($query) {
                            $query->select(['username', 'full_name']);
                        }]);
                    },
                    'instructorCourse' => function ($query) use ($instructorId) {
                        $query->select(['id', 'instructor_id', 'title']);
                    }
                ])
                ->select(['id', 'instructor_course_id', 'student_id', 'review', 'rating', 'created_at', 'updated_at'])
                ->orderBy('created_at', $sort)
                ->paginate(10);


            if (!$data) {
                return ResponseApiHelper::send(Lang::get('request-exception.data_not_found'), Response::HTTP_NOT_FOUND);
            }
            return new InstructorCourseReviewCollection($data);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
