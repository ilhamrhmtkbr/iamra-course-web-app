<?php

namespace Domain\Certificates\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Shared\Models\StudentCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response;

class CertificateGetAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $sort = $request->query('sort', 'desc');
            $certificates = StudentCertificate::getByStudentId(auth()->user()->getAuthIdentifier())
                ->orderBy('created_at', $sort)
                ->paginate(4);

            return ResponseApiHelper::send(Lang::get('request-success.get_data_successfully'), Response::HTTP_OK, $certificates);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
