<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\utils\Repository;

class CouponsTest extends TestCase
{
    function test_instructor_berhasil_mendapatkan_data_coupon()
    {
        Repository::insertCourseCoupon();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/coupons');
        $res->assertJsonFragment([
            'id' => '120r8412-e29b-41d4-a716-346655441234',
            'discount' => 88,
            'max_redemptions' => 12,
            'expiry_date' => '2025-08-02',
        ]);
        Repository::deleteCourseCoupon();
    }

    function test_instructor_gagal_mendapatkan_data_coupon_karena_tidak_terautentikasi()
    {
        $res = $this->get($this->url . '/coupons');
        $res->assertStatus(401)
            ->assertJson([
                'message' => 'Access token not provided'
            ]);
    }

    function test_instructor_berhasil_mendapatkan_data_coupon_detail()
    {
        Repository::insertCourseCoupon();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->get($this->url . '/coupons/show?id=' . Repository::CUSTOM_UUID);
        $res->assertJsonStructure([
            'data' => [
                'id',
                'discount',
                'max_redemptions',
                'expiry_date',
                'created_at',
                'updated_at',
                'instructor_course' => [
                    'id',
                    'title',
                    'status',
                ],
            ],
        ]);

        Repository::deleteCourseCoupon();
    }

    function test_instructor_gagal_mendapatkan_data_coupon_detail_karena_tidak_mengirimkan_id()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
                ->get($this->url . '/coupons/show');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'The id field is required.'
            ]);
    }

    function test_instructor_berhasil_memasukan_data_coupon()
    {
        Repository::insertCourse();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/coupons', [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'discount' => 99,
                'max_redemptions' => 12,
                'expiry_date' => '2025-12-25'
            ]);
        $res->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Store data successfully'
            ]);
        Repository::deleteCourseCoupon();
    }

    function test_instructor_gagal_memasukan_data_coupon_karena_data_coupon_duplikat()
    {
        Repository::insertCourseCoupon();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/coupons', [
                'instructor_course_id' => Repository::INSTRUCTOR_COURSE_ID,
                'discount' => 88,
                'max_redemptions' => 12,
                'expiry_date' => '2025-08-02'
            ]);
        $res->assertStatus(409)
            ->assertJson([
               'success' => false,
               'message' => 'Data has been there'
            ]);
        Repository::deleteCourseCoupon();
    }

    function test_instructor_gagal_memasukan_data_coupon_karena_tidak_mengirimpkan_data_coupon_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->post($this->url . '/coupons');
        $res->assertStatus(422)
            ->assertJson([
               'success' => false,
               'message' => 'Validation failed',
            ])
            ->assertJsonFragment([
                'instructor_course_id' => ['The instructor course id field is required.'],
                'discount' => ['The discount field is required.'],
                'max_redemptions' => ['The max redemptions field is required.'],
                'expiry_date' => ['The expiry date field is required.']
            ]);
    }

    function test_instructor_berhasil_mengubah_data_coupon()
    {
        Repository::insertCourseCoupon();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/coupons', [
                'id' => Repository::CUSTOM_UUID,
                'discount' => 88,
                'max_redemptions' => 12,
                'expiry_date' => '2025-12-12'
            ]);
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Update data successfully'
            ]);
        Repository::deleteCourseCoupon();
    }

    function test_instructor_gagal_mengubah_data_coupon_karena_tidak_mengirimpkan_data_coupon_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->patch($this->url . '/coupons');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed',
            ])
            ->assertJsonFragment([
                'discount' => ['The discount field is required.'],
                'max_redemptions' => ['The max redemptions field is required.'],
                'expiry_date' => ['The expiry date field is required.']
            ]);
    }

    function test_instructor_berhasil_menghapus_data_coupon()
    {
        Repository::insertCourseCoupon();
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/coupons?id=' . Repository::CUSTOM_UUID);
        $res->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Delete data successfully'
            ]);
    }

    function test_instructor_gagal_menghapus_data_coupon_karena_tidak_mengirimpkan_data_coupon_apapun()
    {
        $res = $this->withUnencryptedCookie('access_token', self::$token)
            ->delete($this->url . '/coupons');
        $res->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'The id field is required.',
            ]);
    }
}
