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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('description_uz');
            $table->string('description_ru');
            $table->string('description_en');
            $table->string('star');
            $table->string('image');
            $table->string('role_user_uz');
            $table->string('role_user_ru');
            $table->string('role_user_en');
            $table->unsignedBigInteger('restaran_id')->after('id');
            $table->foreign('restaran_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
