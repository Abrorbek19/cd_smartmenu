<?php

namespace Database\Seeders;

use App\Models\Featuremain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturemainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Featuremain::query()->insert([
            [
                'title_uz' => 'Oson Buyurtma Berish',
                'title_ru' => 'Легкий Заказ',
                'title_en' => 'Easy Ordering',
                'description_uz' => 'QR kodni skanerlab, bir necha qadamda buyurtma bering.',
                'description_ru' => 'Отсканируйте QR-код и оформите заказ за несколько шагов.',
                'description_en' => 'Scan the QR code and place your order in a few steps.',
                'icon' => 'icon_easy_order.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_uz' => 'Eng Yaxshi Sifat',
                'title_ru' => 'Лучшее Качество',
                'title_en' => 'Best Quality',
                'description_uz' => 'Tezkor xizmat! QR kodni skanerlab, buyurtmangizni osongina yuboring. Biz tez va sifatli xizmat ko‘rsatamiz.',
                'description_ru' => 'Быстрое обслуживание! Отсканируйте QR-код и отправьте заказ с легкостью. Мы предоставляем быстрый и качественный сервис.',
                'description_en' => 'Fast service! Scan the QR code and send your order easily. We provide fast and quality service.',
                'icon' => 'icon_best_quality.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_uz' => 'Fikr-mulohaza',
                'title_ru' => 'Отзыв',
                'title_en' => 'Feedback',
                'description_uz' => 'Har bir mijozning fikri biz uchun qiymatli! Xizmatimizni baholashda fikringizni ulashing.',
                'description_ru' => 'Каждое мнение клиента для нас ценно! Поделитесь своим мнением при оценке нашего сервиса.',
                'description_en' => 'Every customer’s opinion is valuable to us! Share your thoughts when rating our service.',
                'icon' => 'icon_feedback.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
