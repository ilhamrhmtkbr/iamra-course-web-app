<?php

namespace App\Actions;

use App\Events\ForumsSendEvent;
use App\Helpers\ResponseApiHelper;
use App\Models\Forum;
use App\Models\InstructorCourse;
use App\Rules\NoProfanity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ForumStoreAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $valid = Validator::make($request->all(), [
                'message' => ['required', 'string', 'min:1', 'max:300', new NoProfanity()],
                'course_id' => ['required', 'string', 'uuid']
            ]);

            if ($valid->fails()) {
                return ResponseApiHelper::send(
                    $valid->errors(),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                );
            }

            $check = InstructorCourse::where('id', $request->course_id)
                ->exists();

            if (!$check) {
                throw new \Exception(Lang::get('request-member.discussion_forum_failed_manipulate'), Response::HTTP_BAD_REQUEST);
            }

            $user = auth()->user();

            if ($user->role === 'user') {
                throw new \Exception(Lang::get('request-member.discussion_forum_failed_no_role'), Response::HTTP_UNAUTHORIZED);
            }

            $created_at = now();

            $payload = [
                'username' => $user->username,
                'name' => $user->full_name,
                'message' => $request->message,
                'created_at' => $created_at,
                'role' => $user->role,
                'course_id' => $request->course_id
            ];

            Forum::create($payload);

            broadcast(new ForumsSendEvent(
                $user->username,
                $user->full_name,
                $request->message,
                $created_at,
                $user->role,
                $request->course_id
            ));

            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, 500);
        }
    }
}
