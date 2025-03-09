<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::all();
        return view('welcome',compact("restaurant",));
    }
}
