<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class ProgressesTest extends TestCase
{
    function test_student_berhasil_mendapatkan_data_course_progresses()
    {
        Repository::insertProgress();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/progresses');
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
                            'sections',
                            'created_at',
                            'updated_at',
                            'instructor_course' => [
                                'id',
                                'title',
                                'sections' => [
                                    '*' => [
                                        'id',
                                        'instructor_course_id',
                                    ]
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

        Repository::deleteProgress();
    }

    function test_student_gagal_mendapatkan_data_course_progresses_karena_tidak_terautentikasi()
    {
        $res = $this->get($this->url . '/progresses');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }

    function test_student_berhasil_mendapatkan_data_course_progress_detail()
    {
        Repository::insertProgress();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/progresses/show?instructor_course_id=' . Repository::INSTRUCTOR_COURSE_ID);
        $res->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'id',
                    'student_id',
                    'instructor_course_id',
                    'sections', // associative array [999 => "title1"], cukup pastikan field ini ada
                    'created_at',
                    'updated_at',
                    'instructor_course' => [
                        'id',
                        'title',
                        'description',
                        'image',
                        'price',
                        'level',
                        'status',
                        'sections' => [
                            '*' => [
                                'id',
                                'instructor_course_id',
                            ]
                        ]
                    ]
                ]
            ]);
        Repository::deleteProgress();
    }

    function test_student_gagal_mendapatkan_data_course_progress_detail_karena_tidak_mengirimkan_course_id()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/progresses/show');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'The instructor course id field is required.'
            ]);
    }

    function test_student_gagal_mendapatkan_data_course_progress_detail_karena_belum_menyelesaikan_kursus()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/progresses/show?instructor_course_id=' . Repository::INSTRUCTOR_COURSE_ID);
        $res->assertStatus(400)
            ->assertJson([
                'success' => false,
                'message' => 'You have not completed any material from this course.'
            ]);
    }

    function test_student_berhasil_menambahkan_data_course_progress()
    {
        Repository::insertStudentBuyCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/progresses', [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'instructor_section_id' => 999,
                'instructor_section_title' => 'title1'
            ]);
        $res->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Store data successfully'
            ]);
        Repository::deleteStudentBuyCourse();
        Repository::deleteProgress();
    }

    function test_student_gagal_menambahkan_data_course_progress_karena_tidak_mengirimkan_data_apapun()
    {
        Repository::insertStudentBuyCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/progresses');
        $res->assertStatus(422)
            ->assertJsonStructure([
                'success',
                'message',
                'errors' => [
                    'instructor_course_id',
                    'instructor_section_id',
                    'instructor_section_title',
                ]
            ]);
        Repository::deleteStudentBuyCourse();
    }

    function test_student_gagal_menambahkan_data_course_progress_karena_data_duplikat()
    {
        Repository::insertStudentBuyCourse();
        Repository::insertProgress();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/progresses', [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'instructor_section_id' => 999,
                'instructor_section_title' => 'title1'
            ]);
        $res->assertJson([
                'message' => 'Data has been there'
            ]);
        Repository::deleteStudentBuyCourse();
        Repository::deleteProgress();
    }
}
