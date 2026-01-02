<?php

namespace Tests\Feature\Member;

use Illuminate\Support\Facades\DB;
use Tests\MemberTestCase;
use Tests\utils\Helper;

class StudentUpSertTest extends MemberTestCase
{
    function test_user_berhasil_mendaftar_atau_mengubah_data_sebagai_student()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->post($this->urlMember . '/student', [
                'role' => 'student',
                'category' => 'jobless',
                'summary' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
            ]);

        $res->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Successfully registered as : student'
            ]);

        DB::connection('mysql')
            ->table('students')
            ->where('user_id', Helper::USERNAME)
            ->delete();
    }

    function test_user_gagal_mendaftar_atau_mengubah_data_sebagai_student_karena_tidak_mengirimkan_data_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->post($this->urlMember . '/student');

        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'role' => ['The role field is required.'],
                'category' => ['The category field is required.'],
                'summary' => ['The summary field is required.']
            ]);
    }
}
