<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Tests\utils\Repository;

class CertificateVerifyTest extends TestCase
{
    function test_user_berhasil_verifikasi_sertifikat()
    {
        Repository::insertStudent();

        DB::connection('mysql')
            ->table('student_certificates')
            ->insert([
                'id' => 'cert-id',
                'student_id' => Repository::USERNAME,
                'instructor_course_id' => Repository::COURSE_ID
            ]);

        $res = $this->get($this->url . '/student/certificate/verify?id=cert-id');

        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Get data successfully',
            ])
            ->assertJsonFragment([
                'id' => 'cert-id'
            ]);

        DB::connection('mysql')
            ->table('student_certificates')
            ->where('id', '=', 'cert-id')
            ->delete();

        Repository::deleteStudent();
    }

    function test_user_gagal_verifikasi_sertifikat_karena_tidak_mengirimkan_id()
    {
        $res = $this->get($this->url . '/student/certificate/verify');
        $res->assertStatus(422)
            ->assertJsonFragment([
                'id' => ['The id field is required.']
            ]);
    }

    function test_user_gagal_verifikasi_sertifikat_karena_certificate_belum_ada()
    {
        $res = $this->get($this->url . '/student/certificate/verify?id=123');
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Get data successfully'
            ])
            ->assertJsonFragment([
                'data' => null
            ]);
    }
}
