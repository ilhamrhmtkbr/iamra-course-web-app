<?php

namespace Domain\Socials\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorSocial;
use Domain\Socials\Requests\SocialUpdateRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class SocialUpdateAction
{
    public function __invoke(SocialUpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $instructorSocial = InstructorSocial::findOrFail($data['id']);
            Gate::authorize('update', $instructorSocial);
            if (InstructorSocial::where('instructor_id', auth()->user()->getAuthIdentifier())
                ->where('url_link', $data['url_link'])
                ->whereNot('id', $data['id'])
                ->exists()) {
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }

            $app_name = 'instagram';

            $apps = ['instagram', 'linkedin', 'facebook'];

            $patterns = [
                '/^(https?:\/\/)?(www\.)?instagram\.com\/[A-Za-z0-9._-]+\/?$/',
                '/^(https?:\/\/)?(www\.)?linkedin\.com\/in\/[A-Za-z0-9_-]+\/?$/',
                '/^(https?:\/\/)?(www\.)?facebook\.com\/[A-Za-z0-9.]+\/?$/',
            ];

            foreach ($patterns as $key => $pattern) {
                if (preg_match($pattern, $data['url_link'])) {
                    $app_name = $apps[$key];
                    break;
                }
            }

            $instructorSocial->url_link = $data['url_link'];
            $instructorSocial->app_name = $app_name;
            $instructorSocial->display_name = $data['display_name'];
            $instructorSocial->save();
            return ResponseApiHelper::send(Lang::get('request-success.update_data_successfully'), Response::HTTP_OK);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
