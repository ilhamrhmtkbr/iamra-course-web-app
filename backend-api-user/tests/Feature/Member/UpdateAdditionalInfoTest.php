<?php

namespace Tests\Feature\Member;

use Tests\MemberTestCase;

class UpdateAdditionalInfoTest extends MemberTestCase
{
    function test_user_berhasil_update_additional_info_profile()
    {
        $imagePath = base_path('tests/utils/image.jpg');
        $imageBase64 = base64_encode(file_get_contents($imagePath));
        $imageMime = mime_content_type($imagePath);
        $imageData = 'data:' . $imageMime . ';base64,' . $imageBase64;

        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->patch($this->urlMember . '/additional-info', [
                'first_name' => 'First',
                'middle_name' => 'Middle',
                'last_name' => 'Name',
                'image' => $imageData,
                'dob' => now(),
                'address' => 'Jl. Menuju Sukses'
            ]);

        $res->assertStatus(200)
            ->assertJson([
                "success" => true,
                "message" => "Additional Info changed successfully : First"
            ]);
    }

    function test_user_gagal_update_additional_info_profile_karena_tidak_mengirimkan_data_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->patch($this->urlMember . '/additional-info', [
                'first_name' => '',
                'middle_name' => '',
                'last_name' => '',
                'image' => '',
                'dob' => '',
                'address' => ''
            ]);

        $res->assertStatus(422)
            ->assertJson([
                "success" => false,
                "message" => "Validation failed"
            ])
            ->assertJsonFragment([
                "first_name" => ["The first name field is required."],
                "middle_name" => ["The middle name field is required."],
                "last_name" => ["The last name field is required."],
                "dob" => ["The dob field is required."],
                "address" => ["The address field is required."]
            ]);
    }
}
