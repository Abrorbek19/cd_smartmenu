<?php

namespace App\Http\Controllers;

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
}
