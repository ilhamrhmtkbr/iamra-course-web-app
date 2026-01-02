<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class SocialsTest extends TestCase
{
    function test_instructor_berhasil_mendapatkan_data_socials()
    {
        Repository::insertSocials();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/socials');
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Get data successfully'
            ])
            ->assertJsonFragment([
                'id' => 999,
                'url_link' => 'https://www.instagram.com/ilhamrhmtkbr',
                'app_name' => 'instagram',
                'display_name' => 'juggernaut',
            ]);
        Repository::deleteSocials();
    }

    function test_instructor_gagal_mendapatkan_data_socials_karena_tidak_terautentikasi()
    {
        $res = $this->get($this->url . '/socials');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }

    function test_instructor_berhasil_memasukan_data_socials()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/socials', [
                'url_link' => 'https://www.instagram.com/ilhamrhmtkbr',
                'display_name' => 'ilhamrhmtkbr'
            ]);
        $res->assertStatus(201)
            ->assertJson([
               'success' => true,
               'message' => 'Store data successfully'
            ]);
        Repository::deleteSocials();
    }

    function test_instructor_gagal_memasukan_data_socials_karena_data_socials_duplikat()
    {
        Repository::insertSocials();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/socials', [
                'url_link' => 'https://www.instagram.com/ilhamrhmtkbr',
                'display_name' => 'ilhamrhmtkbr'
            ]);
        $res->assertStatus(409)
            ->assertJson([
                'success' => false,
                'message' => 'Data has been there'
            ]);
        Repository::deleteSocials();
    }

    function test_instructor_gagal_memasukan_data_socials_karena_tidak_mengirimpkan_data_socials_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/socials');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'url_link' => ['The url link field is required.'],
                'display_name' => ['The display name field is required.']
            ]);
    }

    function test_instructor_berhasil_mengubah_data_socials()
    {
        Repository::insertSocials();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/socials', [
                'id' => Repository::CUSTOM_ID,
                'url_link' => 'https://www.instagram.com/ilhamrhmtkbr',
                'display_name' => 'ilhamrhmtkbr'
            ]);
        $res->assertStatus(200)
            ->assertJson([
               'success' => true,
               'message' => 'Update data successfully'
            ]);
        Repository::deleteSocials();
    }

    function test_instructor_gagal_mengubah_data_socials_karena_tidak_mengirimpkan_data_socials_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/socials');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'url_link' => ['The url link field is required.'],
                'display_name' => ['The display name field is required.']
            ]);
    }

    function test_instructor_berhasil_menghapus_data_socials()
    {
        Repository::insertSocials();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/socials?id=' . Repository::CUSTOM_ID);
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Delete data successfully'
            ]);
    }

    function test_instructor_gagal_menghapus_data_socials_karena_tidak_mengirimpkan_data_socials_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/socials');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'The id field is required.'
            ]);
    }
}
