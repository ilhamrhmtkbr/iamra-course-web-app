<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class AccountsTest extends TestCase
{
    function test_instructor_berhasil_mendapatkan_data_account()
    {
        Repository::insertAccounts();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/account');
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => null
            ])
            ->assertJsonFragment([
                'instructor_id' => 'juggernaut',
                'account_id' => 123321123,
                'bank_name' => 'agris',
                'alias_name' => 'juggernautAlias123',
            ]);
        Repository::deleteAccounts();
    }

    function test_instructor_gagal_mendapatkan_data_account_karena_tidak_terautentikasi()
    {
        $res = $this->get($this->url . '/account');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }

    function test_instructor_gagal_memasukan_data_account_karena_tidak_mengirimpkan_data_account_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/account');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'account_id' => ['The account id field is required.'],
                'bank_name' => ['The bank name field is required.'],
                'alias_name' => ['The alias name field is required.']
            ]);
    }

    function test_instructor_gagal_mengubah_data_account_karena_tidak_mengirimpkan_data_account_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/account');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'account_id' => ['The account id field is required.'],
                'bank_name' => ['The bank name field is required.'],
                'alias_name' => ['The alias name field is required.']
            ]);
    }
}
