<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-post',[AuthController::class,'loginPost'])->name('login-post');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', [Controller::class, "index"])->name("dashboard");
    Route::resource("/restaurants", RestaurantController::class);
    Route::resource('/clients', ClientController::class);
});
