<?php

namespace Tests\Feature\Member;

use Tests\MemberTestCase;
use Tests\utils\Helper;

class AuthenticationUpdateTest extends MemberTestCase
{
    function test_user_berhasil_mengubah_authentication()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->patch($this->urlMember . '/authentication', [
                'username' => Helper::USERNAME,
                'old_password' => Helper::PASSWORD
            ]);

        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Authentication changed successfully : ' . Helper::USERNAME
            ]);
    }

    function test_user_gagal_mengubah_authentication_karena_tidak_ada_mengirimkan_data_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->patch($this->urlMember . '/authentication');

        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'username' => ['The username field is required.'],
                'old_password' => ['The old password field is required.']
            ]);
    }
}
