<?php

namespace App\Services;

use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatisticsService
{
    public function getMenuVisits($restaurantId, $period = 'monthly')
    {
        $url = route('menu', ['id' => $restaurantId]);

        // Vaqt oralig‘i uchun boshlanish va tugash sanalarini aniqlash
        switch ($period) {
            case 'daily': // Kunlik
                $startDate = Carbon::today();
                $endDate = Carbon::tomorrow()->subSecond(); // Bugunning oxiri
                break;

            case 'weekly': // Haftalik
                $startDate = Carbon::now()->startOfWeek(); // Haftaning boshlanishi
                $endDate = Carbon::now()->endOfWeek(); // Haftaning oxiri
                break;

            case 'monthly': // Oylik (default)
            default:
                $startDate = Carbon::now()->startOfMonth(); // Oyning boshlanishi
                $endDate = Carbon::now()->endOfMonth(); // Oyning oxiri
                break;
        }

        // Ko‘rishlarni hisoblash
        $visits = Visitor::query()
            ->where('url', $url)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        return [
            'url' => $url,
            'visits' => $visits,
            'period' => $period,
        ];
    }


    public function getMonthlyStatistics($restaurantId): array
    {
        $statistics = [];
        $startMonth = Carbon::create(2024, 12, 1); // 2024-12 dan boshlash
        $currentMonth = Carbon::now()->startOfMonth();

        while ($startMonth <= $currentMonth) {
            $weeks = $this->getWeeklyStatistics($restaurantId, $startMonth);

            $monthName = trans('messages.month.' . $startMonth->format('F'));
            $statistics[] = [
                'month' => $monthName . ' ' . $startMonth->format('Y'),
                'weeks' => $weeks
            ];
            $startMonth->addMonth();
        }


        return $statistics;
    }

    // Haftalik statistikani olish (oy ichida)
    public function getWeeklyStatistics($restaurantId, $startOfMonth)
    {
        $endOfMonth = $startOfMonth->copy()->endOfMonth();
        $statistics = [];
        $currentWeekStart = $startOfMonth->copy()->startOfWeek(Carbon::MONDAY);

        $weekNumber = 1;

        while ($currentWeekStart <= $endOfMonth) {
            $currentWeekEnd = $currentWeekStart->copy()->endOfWeek(Carbon::SUNDAY);


            $days = $this->getDailyStatistics($restaurantId, $currentWeekStart, $currentWeekEnd);

            $statistics[] = [
                'week_number' => $weekNumber,
                'days' => $days
            ];

            $weekNumber++;
            $currentWeekStart = $currentWeekEnd->addDay();
        }

        return $statistics;
    }

    // Kunlik statistikani olish (hafta ichida)
    public function getDailyStatistics($restaurantId, $startOfWeek, $endOfWeek)
    {
        $statistics = [];
        $currentDay = $startOfWeek->copy(); // Haftaning boshlanish sanasi

        while ($currentDay <= $endOfWeek) {
            $visits = DB::table('visitors')
                ->where('url', route('menu', ['id' => $restaurantId]))
                ->whereDate('created_at', $currentDay)
                ->count();

            $dayName = trans('messages.day.' . $currentDay->format('l')); // Kun nomi tarjimasi
            $statistics[] = [
                'day_name' => $dayName, // Masalan: "Dushanba"
                'date' => $currentDay->format('Y-m-d'), // Sana
                'visits' => $visits
            ];

            $currentDay->addDay(); // Keyingi kunga o'tish
        }

        return $statistics;
    }
}
