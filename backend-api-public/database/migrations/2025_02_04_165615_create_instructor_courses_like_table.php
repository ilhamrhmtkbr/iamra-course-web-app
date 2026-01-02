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
        Schema::create('instructor_courses_like', function (Blueprint $table) {
            $table->string('instructor_course_id')->nullable(false);
            $table->string('user_id')->nullable(false);
            $table->timestamp('created_at')->nullable(false)->useCurrent();

            $table->foreign('instructor_course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors_course_like');
    }
};
