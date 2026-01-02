<?php

namespace App\Actions;

use App\Helpers\ResponseApiHelper;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ForumShowAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $valid = Validator::make($request->all(), [
                'course_id' => 'required|uuid',
            ]);

            if ($valid->fails()) {
                return ResponseApiHelper::send(
                    $valid->errors(),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                );
            }

            $validated = $valid->validated();
            $courseId = $validated['course_id'];

            $user = auth()->user();

            $userId = $user->getAuthIdentifier();

            if ($user->role === 'instructor') {

                try {
                    $exists = DB::table('instructor_courses')
                        ->where('instructor_id', $userId)
                        ->where('id', $courseId)
                        ->exists();


                    if (!$exists) {
                        return ResponseApiHelper::send(
                            'Anda tidak memiliki kursus ini',
                            Response::HTTP_FORBIDDEN
                        );
                    }
                } catch (\Exception $dbError) {
                    throw $dbError;
                }
            }

            if ($user->role === 'student') {
                try {
                    $exists = DB::table('student_transactions')
                        ->where('instructor_course_id', $courseId)
                        ->where('student_id', $userId)
                        ->where('status', 'settlement')
                        ->exists();

                    if (!$exists) {
                        return ResponseApiHelper::send(
                            'Anda tidak memiliki kursus ini',
                            Response::HTTP_FORBIDDEN
                        );
                    }
                } catch (\Exception $dbError) {
                    throw $dbError;
                }
            }

            try {
                $messagesQuery = Forum::where('course_id', $courseId);

                if ($request->has('before')) {
                    $messagesQuery->where('created_at', '<', Carbon::parse($request->query('before')));
                }

                $messages = $messagesQuery
                    ->orderBy('created_at', 'desc')
                    ->limit(10)
                    ->get();

                return ResponseApiHelper::send(
                    Lang::get('request-success.show_data_successfully'),
                    Response::HTTP_OK,
                    $messages
                );
            } catch (\Exception $forumError) {
                throw $forumError;
            }

        } catch (\Exception $e) {
            return ResponseApiHelper::send(
                $e->getMessage(),
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
