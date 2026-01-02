<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class CartsTest extends TestCase
{
    function test_student_berhasil_mendapatkan_seluruh_data_carts()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/carts');

        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Get data successfully',
            ])
            ->assertJsonStructure([
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
    }

    function test_student_gagal_mendapatkan_seluruh_data_carts_karena_tidak_mengirimkan_cookie()
    {
        $res = $this->get($this->url . '/carts');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }

    function test_student_berhasil_memasukan_data_ke_dalam_carts()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/carts', [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID
            ]);
        $res->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Store data successfully'
            ]);
        Repository::deleteCart();
    }

    function test_student_gagal_memasukan_data_ke_dalam_carts_karena_tidak_mengirimkan_data_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/carts');

        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'instructor_course_id' => ['The instructor course id field is required.']
            ]);
    }

    function test_student_gagal_memasukan_data_ke_dalam_carts_karena_data_duplikat()
    {
        Repository::insertCart();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/carts', [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID
            ]);

        $res->assertStatus(409)
            ->assertJson([
                'success' => false,
                'message' =>'Data has been there'
            ]);
        Repository::deleteCart();
    }

    function test_student_berhasil_menghapus_data_ke_dalam_carts()
    {
        Repository::insertCart();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/carts?id=999');

        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    function test_student_gagal_menghapus_data_ke_dalam_carts_karena_tidak_mengirimkan_id()
    {
        Repository::insertCart();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/carts');
        $res->assertJson([
            'success' => false,
            'message' => 'Data not found'
        ]);
        Repository::deleteCart();
    }
}
