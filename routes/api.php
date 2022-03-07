<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('Api')
        ->group(function()
        {
            Route::get('/doctors', 'UserController@index');
            Route::get('/specializations', 'UserController@specializations');
            Route::get('doctors/specialization/{slug}', 'UserController@getDoctorBySpecialization' );
            Route::get('profile-detail/{id}', 'UserController@getDoctorById');
            Route::get('premium', 'UserController@getPremium');
            Route::post('message/', 'MessageController@store');
            Route::get("doctors/premium", "PremiumController@index");
        });
