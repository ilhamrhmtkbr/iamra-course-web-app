<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class SectionGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        ['course_id' => $courseId] = $request->validate(['course_id' => 'required|string']);

        $data = DB::connection('mysql')
            ->table('instructor_sections')
            ->where('instructor_course_id', '=', $courseId)
            ->select(['id', 'title', 'order_in_course'])
            ->orderBy('order_in_course')
            ->get();

        return response()->json([
            'message' => Lang::get('request-success.get_data_successfully'),
            'code' => Response::HTTP_OK,
            'data' => $data
        ]);
    }
}
