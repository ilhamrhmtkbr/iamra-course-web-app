<?php

namespace Tests\Feature\Auth;

use Tests\MemberTestCase;

class LogoutTest extends MemberTestCase
{
    function test_user_berhasil_logout()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->get($this->urlAuth . '/logout');

        $res->assertStatus(200)
            ->assertJson([
                "success" => true,
            ]);
    }

    function test_user_gagal_logout_karena_tidak_menyertakan_cookie_token()
    {
        $res = $this->getJson($this->urlAuth . '/logout');
        $res->assertStatus(401)
            ->assertJson([
                'success' => false,
                'message' => 'Token not provided'
            ]);
    }
}
