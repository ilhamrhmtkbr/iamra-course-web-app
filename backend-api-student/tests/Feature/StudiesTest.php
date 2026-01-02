<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class StudiesTest extends TestCase
{
    public function test_student_berhasil_mendapatkan_data_kursus_yang_diikuti(): void
    {
        Repository::insertStudentBuyCourse();
        $response = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/studies/courses');

        $response->assertJsonStructure([
            'success',
            'message',
            'data' => [
                'current_page',
                'data',
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'links' => [
                    '*' => ['url', 'label', 'active']
                ],
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total',
            ]
        ]);
        Repository::deleteStudentBuyCourse();
    }

    public function test_student_berhasil_mendapatkan_data_bab_yang_diikut(): void
    {
        Repository::insertStudentBuyCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/studies/sections?course_id=' . Repository::INSTRUCTOR_COURSE_ID);
        $res->assertJsonFragment([
            'id' => '550e8400-e29b-41d4-a716-446655440000',
            'instructor_id' => 'clark',
            'title' => 'kursus1',
            'description' => 'description1',
            'price' => 0,
            'level' => 'junior',
            'status' => 'free',
            'visibility' => 'public',
            'notes' => 'notes1',
            'editor' => 'php',
        ]);
        Repository::deleteStudentBuyCourse();
    }

    public function test_student_berhasil_mendapatkan_data_materi_yang_diikut(): void
    {
        Repository::insertStudentBuyCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/studies/lessons?section_id=999');
        $res->assertJsonFragment([
            'instructor_section_id' => 999,
            'title' => 'title1',
            'description' => 'description1',
            'code' => 'code1',
            'order_in_section' => 1,
        ]);
        Repository::deleteStudentBuyCourse();
    }
}
