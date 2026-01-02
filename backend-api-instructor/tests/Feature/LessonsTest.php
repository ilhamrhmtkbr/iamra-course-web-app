<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class LessonsTest extends TestCase
{
    function test_instructor_berhasil_mendapatkan_data_lesson()
    {
        Repository::insertLessons();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/lessons?section_id=' . Repository::CUSTOM_ID);
        $res->assertJsonFragment([
            'id' => 999,
            'instructor_section_id' => 999,
            'title' => 'title lesson 1',
            'description' => 'description lesson 1',
            'code' => 'code lesson 1',
            'order_in_section' => 1,
            'editor' => 'php',
        ]);

        Repository::deleteLessons();
    }

    function test_instructor_gagal_mendapatkan_data_lesson_karena_tidak_mengirimkan_section_id()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/lessons');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'The section id field is required.'
            ]);
    }

    function test_instructor_gagal_mendapatkan_data_lesson_karena_tidak_terautentikasi()
    {
        $res = $this->get($this->url . '/lessons');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }

    function test_instructor_berhasil_memasukan_data()
    {
        Repository::insertSections();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/lessons', [
                'instructor_section_id' => Repository::CUSTOM_ID,
                'title' => 'title lesson 1',
                'description' => 'description lesson 1',
                'code' => 'code lesson 40 charracter
                            code lesson 40 charracter
                            code lesson 40 charracter
                            code lesson 40 charracter
                            code lesson 40 charracter',
                'order_in_section' => 1
            ]);
        $res->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Store data successfully'
            ]);
        Repository::deleteLessons();
    }

    function test_instructor_gagal_memasukan_data_lesson_karena_data_lesson_duplikat()
    {
        Repository::insertLessons();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/lessons', [
                'instructor_section_id' => Repository::CUSTOM_ID,
                'title' => 'title lesson 1',
                'description' => 'description lesson 1',
                'code' => 'code lesson 40 charracter
                            code lesson 40 charracter
                            code lesson 40 charracter
                            code lesson 40 charracter
                            code lesson 40 charracter',
                'order_in_section' => 1
            ]);
        $res->assertStatus(409)
            ->assertJson([
                'success' => false,
                'message' => 'Data has been there'
            ]);
        Repository::deleteLessons();
    }

    function test_instructor_gagal_memasukan_data_lesson_karena_tidak_mengirimkan_data_lesson_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/lessons');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'instructor_section_id' => ['The instructor section id field is required.'],
                'title' => ['The title field is required.'],
                'description' => ['The description field is required.'],
                'code' => ['The code field is required.'],
                'order_in_section' => ['The order in section field is required.']
            ]);
    }

    function test_instructor_berhasil_mengubah_data()
    {
        Repository::insertLessons();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/lessons', [
                'id' => Repository::CUSTOM_ID,
                'instructor_section_id' => Repository::CUSTOM_ID,
                'title' => 'title lesson 1',
                'description' => 'description lesson 1',
                'code' => 'code lesson 40 charracter
                            code lesson 40 charracter
                            code lesson 40 charracter
                            code lesson 40 charracter
                            code lesson 40 charracter',
                'order_in_section' => 1
            ]);
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Update data successfully'
            ]);
        Repository::deleteLessons();
    }

    function test_instructor_gagal_mengubah_data_lesson_karena_tidak_mengirimkan_data_lesson_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/lessons');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'id' => ['The id field is required.'],
                'instructor_section_id' => ['The instructor section id field is required.'],
                'title' => ['The title field is required.'],
                'description' => ['The description field is required.'],
                'code' => ['The code field is required.'],
                'order_in_section' => ['The order in section field is required.']
            ]);
    }

    function test_instructor_berhasil_menghapus_data()
    {
        Repository::insertLessons();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/lessons?id=' . Repository::CUSTOM_ID . '&instructor_section_id=' . Repository::CUSTOM_ID);
        $res->assertStatus(200)
            ->assertJson([
               'success' => true,
               'message' => 'Delete data successfully'
            ]);
    }

    function test_instructor_gagal_menghapus_data_lesson_karena_tidak_mengirimkan_data_lesson_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/lessons');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'The id field is required.'
            ]);
    }
}
