<?php

namespace Domain\Lessons\Actions;

use Domain\Shared\Helpers\PaginateHelper;
use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LessonGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'section_id' => 'required'
            ]);
            if ($validator->fails()) {
                return ResponseApiHelper::send(
                    $validator->errors()->first(),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                );
            }
            $page = $request->get('page', 1);
            $perPage = 4;

            $results = DB::connection('mysql')
                ->select("CALL GetInstructorLessons(?, ?, ?, ?)", [
                    auth()->user()->getAuthIdentifier(),
                    $request->section_id,
                    $page,
                    $perPage
                ]);

            $lessonsData = PaginateHelper::getPages(
                $results,
                $perPage,
                $page,
                $request->url(),
                $request->query()
            );

            return ResponseApiHelper::send(
                Lang::get('request-success.get_data_successfully'),
                Response::HTTP_OK,
                $lessonsData
            );
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
