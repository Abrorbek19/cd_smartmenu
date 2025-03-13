<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FeaturemainController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TitleemainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
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

Route::get('lang/{lang}', function($lang) {
    session(['lang' => $lang]) ;
    return back() ;
})->name('lang');

Route::get('/',[ViewController::class,'index'])->name('index');
Route::get('/restaran/{id}',[ViewController::class,'menu'])->middleware('counter')->name('menu');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-post',[AuthController::class,'loginPost'])->name('login-post');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware(['auth','role:admin'])->prefix('/admin')->group(function () {
    Route::get('/dashboard', [Controller::class, "index"])->name("dashboard");
    Route::resource("/restaurants", RestaurantController::class);
    Route::resource("/users", UserController::class);
    Route::resource('/clients', ClientController::class);
    Route::resource('/titlemains', TitleemainController::class);
    Route::resource('/featuremains', FeaturemainController::class);
    Route::resource('/testimonial',TestimonialController::class);
    Route::put('/users/{id}/update-password', [UserController::class, 'userPasswordUpdate'])->name('update-password');

});

Route::middleware(['auth','role:client|admin'])->prefix('/admin')->group(function () {
    Route::get('/dashboard', [Controller::class, "index"])->name("dashboard");
    Route::get('/profile', [Controller::class, "profile"])->name("profile");
    Route::resource('/categories', CategoryController::class);
    Route::resource('/meals', MealController::class);
    Route::resource('/users', UserController::class)->only('update');
});

