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
        Schema::create('instructor_course_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('instructor_course_id', 70)->nullable(false);
            $table->string('student_id', 45)->nullable(false);
            $table->text('review')->nullable(false);
            $table->integer('rating')->nullable(false);
            $table->timestamps();

            $table->foreign('instructor_course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('user_id')->on('students')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors_course_review');
    }
};
