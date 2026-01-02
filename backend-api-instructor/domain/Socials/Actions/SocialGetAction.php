<?php

namespace Domain\Socials\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class SocialGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = InstructorSocial::where('instructor_id', auth()->user()->getAuthIdentifier())
                ->select(['id', 'url_link', 'app_name', 'display_name', 'created_at', 'updated_at'])->get();
            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $data);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
