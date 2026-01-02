<?php

namespace App\Actions;

use Illuminate\Http\Request;

class CertificateVerifyAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $valid = \Illuminate\Support\Facades\Validator::make(['id' => $request->query('id')], ['id' => 'required']);

            if ($valid->fails()) {
                return response()->json($valid->errors(), \Symfony\Component\HttpFoundation\Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            return response()->json([
                'success' => true,
                'message' => \Illuminate\Support\Facades\Lang::get('request-success.get_data_successfully'),
                'data' => \App\Models\StudentCertificate::where('id', $request->query('id'))
                    ->with([
                        'instructorCourse' => function ($query) {
                            $query->select(['id', 'title']);
                        }, 'student' => function ($query) {
                            $query->with(['user' => function ($query) {
                                $query->select(['username', 'full_name']);
                            }])->select(['user_id']);
                        }])
                    ->select(['id', 'student_id', 'instructor_course_id', 'created_at'])
                    ->first()
            ], \Symfony\Component\HttpFoundation\Response::HTTP_OK);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], $e->getCode());
        }
    }
}
