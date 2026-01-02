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
        Schema::create('student_questions', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 45)->nullable(false);
            $table->string('instructor_course_id', 70)->nullable(false);
            $table->text('question')->nullable(false);
            $table->timestamps();

            $table->foreign('student_id')->references('user_id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('instructor_course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_question');
    }
};
