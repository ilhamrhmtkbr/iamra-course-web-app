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
        Schema::create('instructor_lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instructor_section_id')->nullable(false);
            $table->string('title', 100)->nullable(false);
            $table->text('description')->nullable(false);
            $table->text('code')->nullable(false);
            $table->integer('order_in_section')->nullable(false);
            $table->timestamps();

            $table->foreign('instructor_section_id')->references('id')->on('instructor_sections')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors_lesson');
    }
};
