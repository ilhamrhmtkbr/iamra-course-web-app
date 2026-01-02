<?php

namespace Domain\Certificates\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CertificateLinkAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'certificate_id' => 'required|string|uuid',
            ]);

            if ($validator->fails()) {
                return ResponseApiHelper::send(
                    $validator->errors()->first(),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                );
            }
            $token = $request->cookie('access_token');
            $generateLink = config('app.url') . config('app.api_version') . 'student/certificate/android?id=' . $request->certificate_id . '&token=' . $token;
            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $generateLink);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
