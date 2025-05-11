<?php

use App\Enums\Status;
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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId("category_id")->constrained()->cascadeOnDelete();
            $table->string("name_uz");
            $table->string("name_ru");
            $table->string("name_en");
            $table->text("description_uz")->nullable();
            $table->text("description_ru")->nullable();
            $table->text("description_en")->nullable();
            $table->string("photo");
            $table->string("price");
            $table->string("weight")->nullable();
            $table->string("time");
            $table->integer("status")->default(Status::ACTIVE);
            $table->integer('order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
