<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class EarningsTest extends TestCase
{
    function test_instructor_berhasil_mendapatkan_data_earnings()
    {
        Repository::insertEarnings();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/earnings');

        $res->assertJsonFragment([
            'order_id' => '93ca88t635ba5',
            'student_full_name' => 'user',
            'amount' => 17500,
            'status' => 'settlement',
        ]);

        $res->assertJsonFragment([
            'id' => '550e8400-e29b-41d4-a716-446655440000',
            'instructor_id' => 'juggernaut',
            'title' => 'kursus1',
            'description' => 'description1',
            'image' => 'image1',
            'price' => 0,
            'level' => 'junior',
            'status' => 'free',
            'visibility' => 'public',
            'notes' => 'notes1',
            'requirements' => 'requirements1',
            'editor' => 'php',
        ]);

        Repository::deleteEarnings();
    }

    function test_instructor_gagal_mendapatkan_data_earnings_karena_tidak_terautentikasi()
    {
        $res = $this->get($this->url . '/earnings');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }
}
