<?php

namespace Domain\Certificates\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Certificates\Resources\CertificateResource;
use Domain\Shared\Models\StudentCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CertificateShowAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse|CertificateResource
    {
        try {
            $certificate = StudentCertificate::getByStudentId(auth()->user()->getAuthIdentifier())
                ->where('id', $request->id)
                ->with(['instructorCourse' => function ($query) {
                    $query->with(['instructor' => function ($query) {
                        $query->with(['user' => function ($query) {
                            $query->select(['username', 'full_name']);
                        }])->select(['user_id']);
                    }, 'sections' => function ($query) {
                        $query->select(['id', 'instructor_course_id', 'title', 'order_in_course']);
                    }])->select(['id', 'instructor_id', 'title', 'description', 'image',
                        'price', 'level', 'status', 'notes', 'requirements']);
                }])
                ->first();

            Gate::authorize('show', $certificate);

            return new CertificateResource($certificate);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
