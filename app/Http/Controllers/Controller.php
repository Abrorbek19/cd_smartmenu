<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Feedback;
use App\Models\Restaurant;
use App\Services\StatisticsService;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $month = new StatisticsService();
        $user = Auth::user();
        $clients = Client::where('user_id',$user->id)->first();
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
        ];
        $restaran = Restaurant::with('clients','clients.user')->where('id',$clients->restaurant_id)->first();


        $url = $restaran->clients[0]->restaurant_id;
        $kunlik = $month->getMenuVisits($url, 'daily');
        $haftalik = $month->getMenuVisits($url, 'weekly');
        $oylik = $month->getMenuVisits($url, 'monthly');


        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $feedback = Feedback::where('restaurant_id', $url)
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->get();
        $totalRestaurantStars = 0;
        $totalServiceStars = 0;
        $restaurantStarCount = 0;
        $serviceStarCount = 0;

        foreach ($feedback as $star){
            $restaurantStar = $star['restaurant_star'];
            if ($restaurantStar !== null) {
                $totalRestaurantStars += $restaurantStar;
                $restaurantStarCount++;
            }

            // Service starni hisoblash
            $serviceStar = $star['service_star'];
            if ($serviceStar !== null) {
                $totalServiceStars += $serviceStar;
                $serviceStarCount++;
            }
        }
        $averageRestaurantStar = $restaurantStarCount > 0 ? $totalRestaurantStars / $restaurantStarCount : 0;
        $averageServiceStar = $serviceStarCount > 0 ? $totalServiceStars / $serviceStarCount : 0;


        $restaurantId = $clients->restaurant_id;

//            $monthlyStats = $month->getMonthlyStatistics($restaurantId);
//            $weeklyStats = $month->getWeeklyStatistics($restaurantId,Carbon::now()->format('Y-m'));
//            $dailyStats = $month->getDailyStatistics($restaurantId,Carbon::now()->format('Y-W'));
        $monthlyStats = $month->getMonthlyStatistics($restaurantId);

//            return $monthlyStats;
//            return [
//              'monthly'=>$monthlyStats,
////                'weekly'=>$weeklyStats,
////                'daily'=>$dailyStats,
//            ];
//        return [
//          'restaran_count'=>$restaurantStarCount,
//            'restaran'=>$totalRestaurantStars,
//            'orta_restaran'=>$averageRestaurantStar,
//            'service_count'=>$serviceStarCount,
//            'service'=>$totalServiceStars,
//            'orta_service'=>$averageServiceStar
//        ];

//        return $restaran_star;




        return view("admin.layouts.dashboard",compact("breadcrumbs",'monthlyStats','averageRestaurantStar','averageServiceStar',"user",'oylik','haftalik','kunlik'));
    }


    public function profile()
    {
        $user = Auth::user();

        return view("admin.layouts.profile",compact("user"));
    }
}
