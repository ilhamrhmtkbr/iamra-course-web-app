<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class SectionsTest extends TestCase
{
    function test_instructor_berhasil_mendapatkan_data()
    {
        Repository::insertSections();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/sections?course_id=' . Repository::INSTRUCTOR_COURSE_ID);
        $res->assertJsonFragment([
            'success' => true,
            'message' => 'Get data successfully',
        ]);

        $res->assertJsonFragment([
            'id' => 999,
            'instructor_course_id' => '550e8400-e29b-41d4-a716-446655440000',
            'title' => 'title section 1',
            'order_in_course' => 1,
        ]);

        $res->assertJsonFragment([
            'current_page' => 1,
            'per_page' => 10,
            'total' => 1,
        ]);

        Repository::deleteSections();
    }

    function test_instructor_gagal_mendapatkan_data_sections_karena_tidak_terautentikasi()
    {
        $res = $this->get($this->url . '/sections');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }

    function test_instructor_berhasil_memasukan_data()
    {
        Repository::insertCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/sections', [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'title' => 'title section 1',
                'order_in_course' => 1
            ]);
        $res->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Store data successfully'
            ]);
        Repository::deleteSections();
    }

    function test_instructor_gagal_memasukan_data_sections_karena_data_sections_duplikat()
    {
        Repository::insertSections();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/sections', [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'title' => 'title section 1',
                'order_in_course' => 1
            ]);
        $res->assertStatus(409)
            ->assertJson([
                'success' => false,
                'message' => 'Data has been there'
            ]);
        Repository::deleteSections();
    }

    function test_instructor_gagal_memasukan_data_sections_karena_tidak_mengirimpkan_data_sections_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/sections');

        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'instructor_course_id' => ['The instructor course id field is required.'],
                'title' => ['The title field is required.'],
                'order_in_course' => ['The order in course field is required.']
            ]);
    }

    function test_instructor_berhasil_mengubah_data()
    {
        Repository::insertSections();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/sections', [
                'id' => Repository::CUSTOM_ID,
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'title' => 'title section 1',
                'order_in_course' => 1
            ]);
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Update data successfully'
            ]);
        Repository::deleteSections();
    }

    function test_instructor_gagal_mengubah_data_sections_karena_tidak_mengirimpkan_data_sections_apapun()
    {
        Repository::insertSections();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/sections');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'id' => ['The id field is required.'],
                'instructor_course_id' => ['The instructor course id field is required.'],
                'title' => ['The title field is required.'],
                'order_in_course' => ['The order in course field is required.']
            ]);
    }

    function test_instructor_berhasil_menghapus_data()
    {
        Repository::insertSections();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/sections?id=' . Repository::CUSTOM_ID);
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Delete data successfully'
            ]);
    }

    function test_instructor_gagal_menghapus_data_sections_karena_tidak_mengirimpkan_data_sections_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/sections');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'The id field is required.'
            ]);
    }
}
