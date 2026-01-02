<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class AnswersTest extends TestCase
{
    function test_instructor_berhasil_mendapatkan_data_answer()
    {
        Repository::insertAnswers();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/answers');
        $res->assertJsonFragment([
            'title' => 'kursus1',
            'question_id' => 999,
            'question' => 'bbbbbbbbb?',
            'answer_id' => 999,
            'answer' => 'aaaaaaaaaa',
            'student' => 'user',
        ]);
        Repository::deleteAnswers();
    }

    function test_instructor_gagal_mendapatkan_data_answer_karena_tidak_terautentikasi()
    {
        $res = $this->get($this->url . '/answers');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }

    function test_instructor_berhasil_memasukan_data_answer()
    {
        Repository::insertQuestion();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/answers', [
                'student_question_id' => Repository::CUSTOM_ID,
                'answer' => 'kkkkkkkk'
            ]);
        $res->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Store data successfully'
            ]);
        Repository::deleteAnswers();
    }

    function test_instructor_gagal_memasukan_data_answer_karena_data_answer_duplikat()
    {
        Repository::insertAnswers();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/answers', [
                'student_question_id' => Repository::CUSTOM_ID,
                'answer' => 'aaaaaaaaaa'
            ]);
        $res->assertStatus(409);
        Repository::deleteAnswers();
    }

    function test_instructor_gagal_memasukan_data_answer_karena_tidak_mengirimpkan_data_answer_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/answers');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonFragment([
                'student_question_id' => ['The student question id field is required.'],
                'answer' => ['The answer field is required.']
            ]);
    }

    function test_instructor_berhasil_mengubah_data_answer()
    {
        Repository::insertAnswers();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/answers' , [
                'id' => Repository::CUSTOM_ID,
                'answer' => 'answer Update'
            ]);
        $res->assertStatus(200);
        Repository::deleteAnswers();
    }

    function test_instructor_gagal_mengubah_data_answer_karena_tidak_mengirimpkan_data_answer_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/answers');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ]);
    }
}
