<?php

namespace Tests\Feature\Member;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\MemberTestCase;
use Tests\utils\Helper;

class EmailUpdateTest extends MemberTestCase
{
    function test_user_berhasil_update_email_menggunakan_email_yang_lama_karena_sama()
    {
        DB::connection('mysql')
            ->table('users')
            ->where('username', Helper::USERNAME)
            ->update([
                'email' => Helper::USERNAME . '@gmail.com',
                'email_verified_at' => now()
            ]);

        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->post($this->urlMember . '/email', [
                'email' => Helper::USERNAME . '@gmail.com'
            ]);

        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'You are still using the old email :  : juggernaut@gmail.com'
            ]);

        DB::connection('mysql')
            ->table('users')
            ->where('username', Helper::USERNAME)
            ->update([
                'email' => null,
                'email_verified_at' => null
            ]);
    }

    function test_user_gagal_update_email_karena_data_yang_dimasukan_duplikat()
    {
        DB::connection('mysql')
            ->table('users')
            ->insert([
                'username' => 'johndoe',
                'password' => Hash::make('John123!'),
                'full_name' => 'John Doe',
                'email' => 'johndoe@gmail.com',
                'image' => 'default',
            ]);

        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->post($this->urlMember . '/email', [
                'email' => 'johndoe@gmail.com'
            ]);

        $res->assertStatus(409)
            ->assertJson([
                'success' => false,
                'message' => 'Email has been used by another user'
            ]);

        DB::connection('mysql')
            ->table('users')
            ->where('username', 'johndoe')
            ->delete();
    }

    function test_user_gagal_update_email_karena_tidak_mengirimkan_data_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->post($this->urlMember . '/email');

        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed',
            ])
            ->assertJsonFragment([
                'email' => ['The email field is required.']
            ]);
    }
}
