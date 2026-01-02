<?php

namespace Tests\Feature\Auth;

use Tests\MemberTestCase;

class MeTest extends MemberTestCase
{
    function test_user_berhasil_mendapatkan_data_profile()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->get($this->urlAuth . '/me');

        $res->assertStatus(200)
            ->assertJson([
                "success" => true,
                "message" => "Get data successfully",
                "data" => [
                    "username" => "juggernaut",
                    "full_name" => "user"
                ]
            ]);
    }

    function test_user_gagal_mendapatkan_data_profile_karena_tidak_menyertakan_cookie_token()
    {
        $res = $this->getJson($this->urlAuth . '/me');
        $res->assertStatus(401)
            ->assertJson([
                'success' => false,
                'message' => 'Token not provided'
            ]);
    }
}
