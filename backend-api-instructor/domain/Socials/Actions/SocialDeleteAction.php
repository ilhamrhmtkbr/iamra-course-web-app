<?php

namespace Domain\Socials\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SocialDeleteAction
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
            $instructorSocial = InstructorSocial::findOrFail($request->id);
            Gate::authorize('delete', $instructorSocial);
            InstructorSocial::find($request->id)->delete();
            return ResponseApiHelper::send(Lang::get('request-success.delete_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
