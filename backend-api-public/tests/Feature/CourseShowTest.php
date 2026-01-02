<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class CourseShowTest extends TestCase
{
    function test_user_berhasil_mendapatkan_data_detail_kursus()
    {
        $res = $this->get($this->url . '/course?id=' . Repository::COURSE_ID);

        $res->assertJsonStructure([
            'success',
            'message',
            'data' => [
                'course' => [
                    'id',
                    'instructor_id',
                    'title',
                    'description',
                    'image',
                    'price',
                    'level',
                    'status',
                    'notes',
                    'requirements',
                    'instructor' => [
                        'user_id',
                        'resume',
                        'summary',
                        'user' => [
                            'username',
                            'full_name',
                        ],
                        'socials',
                    ],
                ],
                'likes',
            ],
        ]);
    }
}
