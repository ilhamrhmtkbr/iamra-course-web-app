<?php

namespace Tests\Feature;

use Tests\TestCase;

class CoursesTest extends TestCase
{
    function test_user_berhasil_mendapatkan_data_courses()
    {
        $res = $this->get($this->url . '/courses?page=1');

        $res->assertJsonStructure([
            'data' => [
                '*' => ['id', 'title', 'image'],
            ],
            'links' => ['first', 'last', 'prev', 'next'],
            'meta' => [
                'current_page',
                'from',
                'last_page',
                'links',
                'path',
                'per_page',
                'to',
                'total',
            ],
        ]);
    }

    function test_user_berhasil_mendapatkan_data_courses_dengan_filter()
    {
        $res = $this->get($this->url . '/courses?page=1&level=junior&status=all');

        $res->assertJsonStructure([
            'data' => [
                '*' => ['id', 'title', 'image'],
            ],
            'links' => ['first', 'last', 'prev', 'next'],
            'meta' => [
                'current_page',
                'from',
                'last_page',
                'links',
                'path',
                'per_page',
                'to',
                'total',
            ],
        ]);
    }

    function test_user_berhasil_mendapatkan_data_courses_dengan_search_berdasarka_keyword()
    {
        $res = $this->get($this->url . '/courses?keyword=kursus1');

        $res->assertJsonStructure([
            'data' => [
                '*' => ['id', 'title', 'image'],
            ],
            'links' => ['first', 'last', 'prev', 'next'],
            'meta' => [
                'current_page',
                'from',
                'last_page',
                'links',
                'path',
                'per_page',
                'to',
                'total',
            ],
        ]);
    }
}
