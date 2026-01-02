<?php

namespace Domain\Socials\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\InstructorSocial;
use Domain\Socials\Requests\SocialStoreRequest;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class SocialStoreAction
{
    public function __invoke(SocialStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $query = InstructorSocial::where('instructor_id', auth()->user()->getAuthIdentifier());

            if (collect($query->get())->count() > 5) {
                throw new \Exception(Lang::get('request-instructor.social_insert_failed_max'), Response::HTTP_CONFLICT);
            }

            if ($query->where('url_link', $data['url_link'])
                ->exists()) {
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }

            $instructorSocial = new InstructorSocial();
            $instructorSocial->instructor_id = auth()->user()->getAuthIdentifier();
            $instructorSocial->url_link = $data['url_link'];

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

            $instructorSocial->app_name = $app_name;
            $instructorSocial->display_name = $data['display_name'];
            $instructorSocial->save();
            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
