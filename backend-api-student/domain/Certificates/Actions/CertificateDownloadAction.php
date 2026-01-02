<?php

namespace Domain\Certificates\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Barryvdh\DomPDF\Facade\Pdf;
use Domain\Shared\Models\StudentCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\HttpFoundation\Response;

class CertificateDownloadAction
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|string|uuid'
            ]);
            if ($validator->fails()){
                return ResponseApiHelper::send(
                    $validator->errors()->first(),
                    Response::HTTP_UNPROCESSABLE_ENTITY
                );
            }
            $certificate = StudentCertificate::where('id', $request->query('id'))
                ->with(['instructorCourse' => function ($query) {
                    $query->select(['id', 'title']);
                }])->select(['id', 'student_id', 'instructor_course_id', 'created_at'])
                ->first();

            Gate::authorize('download', $certificate);

            $qrCode = config('app.frontend_url.public') . '/certificates?id=' . $certificate->id;

            $data = [
                'name' => auth()->user()->full_name,
                'cert_id' => $certificate->id,
                'course' => $certificate->instructorCourse->title,
                'date' => $certificate->created_at,
                'qr_code' => base64_encode(QrCode::format('png')->size(150)->generate($qrCode)),
            ];

            $pdf = Pdf::loadView('certificate', $data);
            $pdf->setPaper('a4', 'landscape');

            $fileName = $data['name'] . ' - ' . $data['course'] . '.pdf';

            return \response($pdf->stream($fileName))
                ->header('Content-Type', 'application/pdf');
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
