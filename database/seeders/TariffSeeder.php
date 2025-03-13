<?php

namespace Database\Seeders;

use App\Models\Tariff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tariff::query()->insert([
            [
                'name_uz' => 'Oylik',
                'name_ru' => 'Ежемесячный',
                'name_en' => 'Monthly',
                'price' => '249 000',
                'days' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_uz' => 'Uch Oylik',
                'name_ru' => 'Трехмесячный',
                'name_en' => 'Three-Month',
                'price' => '700 000',
                'days' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_uz' => 'Olti Oylik',
                'name_ru' => 'Шестимесячный',
                'name_en' => 'Six-Month',
                'price' => '1 400 000',
                'days' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_uz' => 'Yillik',
                'name_ru' => 'Годовой',
                'name_en' => 'Yearly',
                'price' => '2 449 000',
                'days' => 365,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
