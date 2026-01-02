<?php

namespace Domain\Certificates\Actions;

use Domain\Shared\Helpers\ResponseApiHelper;
use Domain\Certificates\Requests\CertificateStoreRequest;
use Domain\Shared\Models\InstructorEarning;
use Domain\Shared\Models\InstructorSection;
use Domain\Shared\Models\StudentCertificate;
use Domain\Shared\Models\StudentCourseProgress;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CertificateStoreAction
{
    public function __invoke(CertificateStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $request->validated();
            $courseId = $data['instructor_course_id'];
            $studentId = auth()->user()->getAuthIdentifier();
            $studentSettlementCourse = InstructorEarning::isStudentPaid($studentId, $courseId)->exists();
            if (!$studentSettlementCourse) {
                throw new \Exception(Lang::get('request-student.section_get_failed'), Response::HTTP_BAD_REQUEST);
            }

            if (StudentCertificate::where('student_id', $studentId)
                ->where('instructor_course_id', $courseId)
                ->exists()) {
                throw new \Exception(Lang::get('request-exception.data_has_been_there'), Response::HTTP_CONFLICT);
            }

            $sections = StudentCourseProgress::where('student_id', $studentId)
                                    ->where('instructor_course_id', $courseId)
                                    ->select(['id', 'instructor_course_id', 'sections'])
                                    ->first();
            if (!$sections){
                throw new \Exception(Lang::get('request-student.certificate_store_failed'), Response::HTTP_BAD_REQUEST);
            }
            $completedSections = count($sections->sections);

            if ($completedSections === InstructorSection::where('instructor_course_id', $courseId)->count()) {
                $studentCertificate = new StudentCertificate();
                $studentCertificate->id = Str::uuid();
                $studentCertificate->student_id = $studentId;
                $studentCertificate->instructor_course_id = $data['instructor_course_id'];
                $studentCertificate->save();
            } else {
                throw new \Exception(Lang::get('request-student.certificate_insert_failed_not_complete'), Response::HTTP_BAD_REQUEST);
            }
            return ResponseApiHelper::send(Lang::get('request-success.store_data_successfully'), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ResponseApiHelper::send($e, $e->getCode());
        }
    }
}
