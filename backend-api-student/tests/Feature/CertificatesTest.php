<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class CertificatesTest extends TestCase
{
    function test_student_berhasil_mendapatkan_seluruh_data_certificates()
    {
        Repository::insertCertificates();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/certificates');
        $res->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'current_page',
                    'data' => [
                        '*' => [
                            'id',
                            'student_id',
                            'instructor_course_id',
                            'created_at',
                            'updated_at',
                            'instructor_course' => [
                                'id',
                                'title',
                            ],
                            'student' => [
                                'user_id',
                                'user' => [
                                    'username',
                                    'full_name',
                                ]
                            ]
                        ]
                    ],
                    'first_page_url',
                    'from',
                    'last_page',
                    'last_page_url',
                    'links' => [
                        '*' => [
                            'url',
                            'label',
                            'active',
                        ]
                    ],
                    'next_page_url',
                    'path',
                    'per_page',
                    'prev_page_url',
                    'to',
                    'total',
                ]
            ]);
        Repository::deleteCertificates();
    }

    function test_student_berhasil_mendapatkan_data_certificate_detail()
    {
        Repository::insertCertificates();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/certificates/show?id=' . Repository::STUDENT_CERT_ID);
        $res->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'course' => [
                        'id',
                        'title',
                        'description',
                        'image',
                        'price',
                        'level',
                        'sections' => [
                            '*' => [
                                'id',
                                'instructor_course_id',
                                'title',
                                'order_in_course',
                            ]
                        ]
                    ],
                    'created_at',
                    'instructor',
                ]
            ]);
        Repository::deleteCertificates();
    }

    function test_student_gagal_mendapatkan_data_certificate_detail_karena_tidak_menyertakan_id()
    {
        Repository::insertCertificates();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/certificates/show');
        $res->assertJson([
            'success' => false,
            'message' => 'You are not authorized to perform this action'
        ]);
        Repository::deleteCertificates();
    }

    function test_student_berhasil_mendapatkan_link_certificate_untuk_app_android()
    {
        Repository::insertCertificates();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/certificates/link?certificate_id=' . Repository::STUDENT_CERT_ID);
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Get data successfully'
            ]);
        Repository::deleteCertificates();
    }

    function test_student_gagal_mendapatkan_link_certificate_untuk_app_android_karena_tidak_menyertakan_cert_id()
    {
        Repository::insertCertificates();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/certificates/link');
        $res->assertStatus(422);
        Repository::deleteCertificates();
    }

    function test_student_berhasil_mendownload_certificate()
    {
        Repository::insertCertificates();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/certificates/download?id=' . Repository::STUDENT_CERT_ID);
        $res->assertStatus(200);
        $res->assertHeader('Content-Type', 'application/pdf');
        Repository::deleteCertificates();
    }

    function test_student_gagal_mendownload_certificate()
    {
        Repository::insertCertificates();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/certificates/download');
        $res->assertStatus(422);
        Repository::deleteCertificates();
    }

    function test_student_gagal_menambahkan_certificate_karena_belum_menyelesaikan_progress_satupun()
    {
        Repository::insertStudentBuyCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/certificates' ,[
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID
            ]);
        $res->assertStatus(400)
            ->assertJson([
                'success' => false,
                'message' => 'You have not completed any material from this course.'
            ]);
        Repository::deleteStudentBuyCourse();
    }

    function test_student_gagal_menambahkan_certificate_karena_data_duplikat()
    {
        Repository::insertStudentBuyCourse();
        Repository::insertCertificates();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/certificates' ,[
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID
            ]);
        $res->assertStatus(409)
            ->assertJson([
                'success' => false,
                'message' => 'Data has been there'
            ]);
        Repository::deleteStudentBuyCourse();
        Repository::deleteCertificates();
    }

    function test_student_gagal_menambahkan_certificate_karena_tidak_mengirimkan_data_apapun()
    {
        Repository::insertStudentBuyCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/certificates');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'instructor_course_id' => ['The instructor course id field is required.']
            ]);
        Repository::deleteStudentBuyCourse();
    }
}
