<?php

namespace Domain\Sections\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SectionDeleteAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
               'id' => 'required'
            ]);
            if ($validator->fails()) {
                return ResponseApiHelper::send(
                    $validator->errors()->first(),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                );
            }
            $instructorSection = InstructorSection::getByInstructor(auth()->user()->getAuthIdentifier())
                ->where('id', $request->id);

            Gate::authorize('delete', $instructorSection->first());

            $instructorSection->delete();
            return ResponseApiHelper::send(Lang::get('request-success.delete_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
