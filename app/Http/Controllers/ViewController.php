<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Category;
use App\Models\Client;
use App\Models\Featuremain;
use App\Models\Restaurant;
use App\Models\Testimonial;
use App\Models\Titleemain;


class ViewController extends Controller
{
    public function index()
    {
        $testimonial = Testimonial::with('restaurant')->get();
        $restaurant = Restaurant::all();
        $title = Titleemain::all();
        $feature = Featuremain::all();
        return view('welcome',compact("title","feature","restaurant",'testimonial'));
    }

    public function menu($id)
    {
        $restaurant = Restaurant::where(['id'=> $id,'status'=>1])->first();
        if (!$restaurant) {
            return view('menu.404');
        }

        $client = Client::where('restaurant_id', $restaurant->id)->with(['user','restaurant'])->first();
        $categories = Category::where('client_id', $id)
            ->where('status', Status::ACTIVE->value)
            ->orderBy('id','asc')
            ->get();

        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        return view('menu.index', compact( 'restaurant', 'client',"categories",'id'));
    }
}
