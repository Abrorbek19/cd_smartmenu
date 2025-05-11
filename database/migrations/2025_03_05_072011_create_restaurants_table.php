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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("logo")->nullable();
            $table->string("phone_number");
            $table->string("address_uz");
            $table->string("address_ru");
            $table->string("address_en");
            $table->string("instagram")->nullable();
            $table->string("tiktok")->nullable();
            $table->string("youtube")->nullable();
            $table->string("telegram")->nullable();
            $table->integer("tax")->default(0);
            $table->time('work_time_start');
            $table->time('work_time_end');
            $table->string("start_work_day_uz");
            $table->string("end_work_day_uz");
            $table->string("start_work_day_ru");
            $table->string("end_work_day_ru");
            $table->string("start_work_day_en");
            $table->string("end_work_day_en");
            $table->integer("status")->default(0);
            $table->string('channel_id')->nullable();
            $table->text('location')->nullable();
            $table->string('delivery_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
