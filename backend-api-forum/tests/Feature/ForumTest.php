<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class ForumTest extends TestCase
{
    public function test_instructor_berhasil_mendapatkan_data_forum(): void
    {
        Repository::insertCourse();
        $res = $this->withUnencryptedCookie('access_token', $this->instructorToken)
            ->get($this->url . '/data');

        $res->assertStatus(200);
        $res->assertJson([
            'success' => true,
            'message' => 'Get data successfully',
        ]);
        $res->assertJsonStructure([
            'success',
            'message',
            'data' => [
                ['id', 'title', 'description', 'image', 'editor']
            ]
        ]);

        Repository::deleteCourse();
    }

    public function test_instructor_gagal_mendapatkan_data_forum_karena_tidak_terautentikasi(): void
    {
        $res = $this->get($this->url . '/data');

        $res->assertStatus(401);
        $res->assertJson([
            'message' => 'Access token not provided',
        ]);
    }

    public function test_student_berhasil_mendapatkan_data_forum(): void
    {
        Repository::insertStudentTransactions();
        $res = $this->withUnencryptedCookie('access_token', $this->studentToken)
            ->get($this->url . '/data');

        $res->assertStatus(200);
        $res->assertJson([
            'success' => true,
            'message' => 'Get data successfully',
        ]);
        $res->assertJsonStructure([
            'success',
            'message',
            'data' => [
                ['id', 'title', 'description', 'image', 'editor']
            ]
        ]);

        Repository::deleteStudentTransactions();
    }

    public function test_student_gagal_mendapatkan_data_forum_karena_tidak_terautentikasi(): void
    {
        $res = $this->get($this->url . '/data');

        $res->assertStatus(401);
        $res->assertJson([
            'message' => 'Access token not provided',
        ]);
    }

    public function test_member_gagal_mendapatkan_data_forum_karena_belum_mendaftarkan_role()
    {
        $res = $this->withUnencryptedCookie('access_token', $this->userToken)
            ->get($this->url . '/data');

        $res->assertStatus(403);
        $res->assertJson([
            'message' => 'Access denied: Student/Instructor role required, you are : user',
        ]);
    }

    public function test_user_gagal_mendapatkan_data_forum_message_karena_role_tidak_memenuhi_syarat(): void
    {
        $res = $this->withUnencryptedCookie('access_token', $this->userToken)
            ->get($this->url . '/data/show?course_id=' . Repository::INSTRUCTOR_COURSE_ID);

        $res->assertStatus(403);
        $res->assertJson([
            'message' => 'Access denied: Student/Instructor role required, you are : user',
        ]);
    }

    public function test_instructor_berhasil_mendapatkan_data_forum_message(): void
    {
        Repository::insertCourse();
        $res = $this->withUnencryptedCookie('access_token', $this->instructorToken)
            ->get($this->url . '/data/show?course_id=' . Repository::INSTRUCTOR_COURSE_ID);

        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Get data successfully'
            ]);
        Repository::deleteCourse();
    }

    public function test_instructor_gagal_mendapatkan_data_forum_message_karena_tidak_mengirimkan_course_id(): void
    {
        $res = $this->withUnencryptedCookie('access_token', $this->instructorToken)
            ->get($this->url . '/data/show');

        $res->assertStatus(422)
            ->assertSeeText('The course id field is required.');
    }

    public function test_student_berhasil_mendapatkan_data_forum_message(): void
    {
        Repository::insertStudentTransactions();
        $res = $this->withUnencryptedCookie('access_token', $this->studentToken)
            ->get($this->url . '/data/show?course_id=' . Repository::INSTRUCTOR_COURSE_ID);

        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Get data successfully'
            ]);
        Repository::deleteStudentTransactions();
    }

    public function test_student_gagal_mendapatkan_data_forum_message_karena_tidak_mengirimkan_course_id(): void
    {
        $res = $this->withUnencryptedCookie('access_token', $this->studentToken)
            ->get($this->url . '/data/show');

        $res->assertStatus(422)
            ->assertSeeText('The course id field is required.');
    }

    public function test_user_gagal_memasukan_data_forum_message_karena_role_tidak_memenuhi_syarat(): void
    {
        $res = $this->withUnencryptedCookie('access_token', $this->userToken)
            ->post($this->url . '/data');

        $res->assertStatus(403);
        $res->assertJson([
            'message' => 'Access denied: Student/Instructor role required, you are : user',
        ]);
    }

    public function test_instructor_berhasil_memasukan_data_forum_message(): void
    {
        Repository::insertCourse();
        $res = $this->withUnencryptedCookie('access_token', $this->instructorToken)
            ->post($this->url . '/data', [
                'message' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
                'course_id' => Repository::INSTRUCTOR_COURSE_ID
            ]);

        $res->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Store data successfully'
            ]);
        Repository::deleteCourse();
    }

    public function test_instructor_gagal_memasukan_data_forum_message_karena_tidak_mengirimkan_data_apapun(): void
    {
        $res = $this->withUnencryptedCookie('access_token', $this->instructorToken)
            ->post($this->url . '/data');

        $res->assertStatus(422)
            ->assertSeeText('The message field is required.')
            ->assertSeeText('The course id field is required.');
    }

    public function test_student_berhasil_memasukan_data_forum_message(): void
    {
        Repository::insertStudentTransactions();
        $res = $this->withUnencryptedCookie('access_token', $this->studentToken)
            ->post($this->url . '/data', [
                'message' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
                'course_id' => Repository::INSTRUCTOR_COURSE_ID
            ]);

        $res->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Store data successfully'
            ]);
        Repository::deleteStudentTransactions();
    }

    public function test_student_gagal_memasukan_data_forum_message_karena_tidak_mengirimkan_data_apapun(): void
    {
        $res = $this->withUnencryptedCookie('access_token', $this->studentToken)
            ->post($this->url . '/data');

        $res->assertStatus(422)
            ->assertSeeText('The message field is required.')
            ->assertSeeText('The course id field is required.');
    }
}
