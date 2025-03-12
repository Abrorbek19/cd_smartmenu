<?php

namespace Database\Seeders;

use App\Models\Titleemain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TitleemainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            [
                'title_uz' => "Qog'oz menyularni o'tkazib yuboring, buyurtmani qabul qilish uchun QR kodni skanerlang",
                'title_ru' => "Пропустите бумажные меню, сканируйте QR-код для приема заказа",
                'title_en' => "Skip paper menus, scan the QR code to accept orders",
                'description_uz' => "Bizning maqsadimiz – sizga restoran menyularini osongina taqdim etib, qulay va tezkor tarzda buyurtma berishingizga yordam berish.",
                'description_ru' => "Наша цель – помочь вам легко представить ресторанные меню и удобно и быстро сделать заказ.",
                'description_en' => "Our goal is to help you easily present restaurant menus and order conveniently and quickly.",
                'position' => 'main',
            ],
            [
                'title_uz' => "Bizning Takliflarimiz",
                'title_ru' => "Наши Предложения",
                'title_en' => "Our Offers",
                'description_uz' => "Tezkor va Qulay Menyu Xizmati",
                'description_ru' => "Быстрая и Удобная Меню Услуга",
                'description_en' => "Quick and Convenient Menu Service",
                'position' => 'offer',
            ],
            [
                'title_uz' => "BIZNING HAMKORLAR",
                'title_ru' => "НАШИ ПАРТНЕРЫ",
                'title_en' => "OUR PARTNERS",
                'description_uz' => "Siz Yoqtiradigan Taomlarni Taqdim Etuvchi Restoran va Kafelar",
                'description_ru' => "Рестораны и Кафе, Которые Вам Понравятся",
                'description_en' => "Restaurants and Cafes You Will Love",
                'position' => 'client',
            ],
            [
                'title_uz' => "Fikr-mulohazalar",
                'title_ru' => "Отзывы",
                'title_en' => "Feedback",
                'description_uz' => "Hamkorlarimizning Fikr-Mulohazalari",
                'description_ru' => "Отзывы Наших Партнеров",
                'description_en' => "Our Partners' Feedback",
                'position' => 'feedback',
            ],
            [
                'title_uz' => "Biz bilan bog'laning",
                'title_ru' => "Свяжитесь с Нами",
                'title_en' => "Contact Us",
                'description_uz' => "Restoran yoki kafengiz uchun SmartMenu xizmatlarimizni o'rganishni xohlaysizmi? Quyidagi formani to'ldiring, va biz siz bilan tez orada bog'lanamiz!",
                'description_ru' => "Хотите изучить наши услуги SmartMenu для вашего ресторана или кафе? Заполните форму ниже, и мы скоро свяжемся с вами!",
                'description_en' => "Want to learn about our SmartMenu services for your restaurant or cafe? Fill out the form below, and we will contact you soon!",
                'position' => 'contact',
            ],
            [
                'title_uz' => "SmartMenu bilan bugun boshlang!",
                'title_ru' => "Начните сегодня с SmartMenu!",
                'title_en' => "Start Today with SmartMenu!",
                'description_uz' => "SmartMenu orqali kelajakdagi ovqatlanish tajribasini sinab ko‘ring. Qog'oz menyularni kutishga hojat yo‘q, barchasi tezkor, qulay va ekologik toza.",
                'description_ru' => "Попробуйте будущий опыт питания с SmartMenu. Не ждите бумажные меню, все быстро, удобно и экологично.",
                'description_en' => "Experience the future of dining with SmartMenu. No need to wait for paper menus; everything is fast, convenient, and eco-friendly.",
                'position' => 'design',
            ],
        ];

        foreach ($titles as $title) {
           Titleemain::query()->insert($title);
        }
    }
}
