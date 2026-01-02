<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class SectionsTest extends TestCase
{
    function test_user_berhasil_mendapatkan_data_section_dari_course()
    {
        $res = $this->get($this->url . '/section?course_id=' . Repository::COURSE_ID);
        $res->assertJsonStructure([
            'message',
            'code',
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'order_in_course',
                ],
            ],
        ]);

    }
}
