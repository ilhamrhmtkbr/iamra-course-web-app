<?php

namespace App\Actions;

use App\Helpers\ResponseApiHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class ForumGetAction
{
    public function __invoke(): \Illuminate\Http\JsonResponse
    {
        $user = auth()->user();
        $userId = $user->getAuthIdentifier();

        if ($user->role === 'student') {
            $data = DB::connection('mysql')
                ->table('student_transactions')
                ->where('student_transactions.student_id', $userId)
                ->where('student_transactions.status', 'settlement')
                ->orderBy('student_transactions.updated_at', 'desc')
                ->join('instructor_courses', 'student_transactions.instructor_course_id', '=', 'instructor_courses.id')
                ->select([
                    'instructor_courses.id',
                    'instructor_courses.title',
                    'instructor_courses.description',
                    'instructor_courses.image',
                    'instructor_courses.editor'
                ])
                ->get();
        } else if ($user->role === 'instructor') {
            $data = DB::connection('mysql')
                ->table('instructor_courses')
                ->where('instructor_id', $userId)
                ->select(['id', 'title', 'description', 'image', 'editor'])
                ->get();
        }

        return ResponseApiHelper::send(
            Lang::get('request-success.get_data_successfully'),
            Response::HTTP_OK,
            $data
        );
    }
}
