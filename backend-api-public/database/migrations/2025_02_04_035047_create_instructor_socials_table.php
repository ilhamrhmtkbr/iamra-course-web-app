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
        Schema::create('instructor_socials', function (Blueprint $table) {
            $table->id();
            $table->string('instructor_id', 45)->nullable(false);
            $table->string('url_link', 145)->nullable(false);
            $table->string('app_name', 50)->nullable(false);
            $table->string('display_name', 70)->nullable()->default('display name');
            $table->timestamps();

            $table->foreign('instructor_id')->references('user_id')->on('instructors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors_social');
    }
};
