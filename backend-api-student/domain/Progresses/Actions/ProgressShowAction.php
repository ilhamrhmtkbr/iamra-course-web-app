<?php

namespace Domain\Progresses\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\StudentCourseProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProgressShowAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'instructor_course_id' => 'required|string|uuid'
            ]);

            if ($validator->fails()) {
                return ResponseApiHelper::send(
                    $validator->errors()->first(),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                );
            }

            $data = StudentCourseProgress::where('student_id', auth()->user()->getAuthIdentifier())
                ->where('instructor_course_id', $request->query('instructor_course_id'))
                ->with(['instructorCourse' => function ($query) {
                    $query->select(['id', 'title', 'description', 'image', 'price', 'level', 'status'])
                        ->with(['sections:id,instructor_course_id']);
                }])
                ->first();

            if (!$data) {
                throw new \Exception(Lang::get('request-student.certificate_store_failed'), Response::HTTP_BAD_REQUEST);
            }

            return ResponseApiHelper::send(
                Lang::get('request-success.show_data_successfully'),
                Response::HTTP_OK,
                $data
            );
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
