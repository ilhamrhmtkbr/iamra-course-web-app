<?php

namespace App\Actions;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseShowAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        $course = \App\Models\InstructorCourse::public()
            ->where('id', $request->query('id'))
            ->with(['instructor' => function ($query) {
                $query->with(['user' => function ($query) {
                    $query->select(['username', 'full_name']);
                }, 'socials' => function ($query) {
                    $query->select(['instructor_id', 'url_link', 'app_name', 'display_name']);
                }])->select(['user_id', 'resume', 'summary']);
            }])
            ->select(['id', 'instructor_id', 'title', 'description', 'image', 'price', 'level', 'status', 'notes', 'requirements'])
            ->first();

        $likes = 0;

        if($course->likedByUser()){
            $likes = $course->likedByUser()->count();
        }

        $data = [
            'course' => $course,
            'likes' => $likes
        ];

        $token = $request->cookie('access_token');

        Log::info(config('jwt.secret'));

        if($token){
            $secret = config('jwt.secret');
            $payload = JWT::decode($token, new Key($secret, 'HS256'));

            $data['isLikes'] = $course->likedByUser()->where('user_id', $payload->sub)->exists();
        }

        return response()->json([
            'success' => true,
            'message' => \Illuminate\Support\Facades\Lang::get('request-success.get_data_successfully'),
            'data' => $data
        ], \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }
}
