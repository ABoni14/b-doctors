<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware("auth")
    ->namespace("Admin")
    ->name("admin.")
    ->prefix("admin")
    ->group(function(){
        Route::get("/", "HomeController@index")->name("index");
        Route::resource("dashboard", 'UserController');
        Route::resource("messages", "MessageController");
        Route::resource("reviews", "ReviewController");
        // Route::get("/payments", 'PaymentController@index')->name("payment");
    });

Route::get('/payments', function(){


})->name('payment');

Route::get("{any?}", function(){
    return view("guest.home");
})->where("any", ".*")->name("home");

