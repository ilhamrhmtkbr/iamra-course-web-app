<?php

namespace Tests\Feature\Member;

use Illuminate\Support\Facades\DB;
use Tests\MemberTestCase;
use Tests\utils\Helper;

class InstructorUpSertTest extends MemberTestCase
{
    function test_user_berhasil_mendaftar_atau_mengubah_data_sebagai_instructor()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->post($this->urlMember . '/instructor', [
                'role' => 'instructor'
            ]);

        $res->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Successfully registered as : instructor'
            ]);

        DB::connection('mysql')
            ->table('instructors')
            ->where('user_id', Helper::USERNAME)
            ->delete();
    }

    function test_user_gagal_mendaftar_atau_mengubah_data_sebagai_instructor_karena_tidak_mengirimkan_data_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->post($this->urlMember . '/instructor');

        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'role' => ['The role field is required.']
            ]);
    }
}
