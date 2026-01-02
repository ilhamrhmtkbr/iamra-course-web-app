<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instructor_courses_coupons', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->string('instructor_course_id', 70)->nullable(false)->unique();
            $table->integer('discount')->nullable(false);
            $table->integer('max_redemptions')->nullable(false);
            $table->date('expiry_date')->nullable(false);
            $table->timestamps();

            $table->foreign('instructor_course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors_course');
    }
};
