<?php

namespace Domain\Reviews\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorCourseReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class ReviewDeleteAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $courseReview = InstructorCourseReview::where('student_id', auth()->user()->getAuthIdentifier())
                ->where('id', $request->id)
                ->first();

            $courseReview->delete();
            return ResponseApiHelper::send(Lang::get('request-success.delete_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
