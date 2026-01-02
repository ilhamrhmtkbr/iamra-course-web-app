<?php

namespace Tests\Feature\Member;

use Illuminate\Support\Facades\DB;
use Tests\MemberTestCase;
use Tests\utils\Helper;

class CourseLikeUpdateTest extends MemberTestCase
{
    function test_user_berhasil_menyukai_kursus()
    {
        $courseId = 'kursus-id';

        DB::connection('mysql')
            ->table('instructors')
            ->insert([
                'user_id' => Helper::USERNAME
            ]);

        DB::connection('mysql')
            ->table('instructor_courses')
            ->insert([
                'id' => $courseId,
                'instructor_id' => Helper::USERNAME,
                'title' => 'Kursus Title',
                'description' => 'Kursus Description',
                'image' => 'Kursus Image',
                'price' => 0,
                'level' => 'junior',
                'status' => 'free',
                'visibility' => 'public',
                'notes' => 'Kursus Notes',
                'requirements' => 'Kursus Requirements',
                'editor' => 'php'
            ]);

        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->patch($this->urlMember . '/course-like', [
                'id' => $courseId
            ]);

        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Successfully to like the course'
            ]);

        DB::connection('mysql')
            ->table('instructor_courses')
            ->where('id', $courseId)
            ->delete();

        DB::connection('mysql')
            ->table('instructors')
            ->where('user_id', Helper::USERNAME)
            ->delete();
    }

    function test_user_gagal_menyukai_kursus_karena_data_tidak_ada()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->patch($this->urlMember . '/course-like', [
                'id' => 'tidak-ada'
            ]);

        $res->assertStatus(404)
            ->assertJson([
                'success' => false,
                'message' => 'Failed to like the course, no data found'
            ]);
    }

    function test_user_gagal_menyukai_kursus_karena_tidak_mengirimkan_id()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->token)
            ->patch($this->urlMember . '/course-like');

        $res->assertStatus(422)
            ->assertJson([
                "success" => false,
                "message" => "The id field is required."
            ]);
    }
}
