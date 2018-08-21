<?php

use Illuminate\Http\Request;

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

Route::namespace('Http\Controllers')->middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', App\Controllers\HomeController::class);

Route::post('/login', App\Controllers\Auth\UserLoginController::class);
Route::post('/register', App\Controllers\Auth\UserRegisterController::class);
Route::get('/user', App\Controllers\Auth\UserGetController::class)->middleware('auth:api');

Route::get('/foursquare', App\Controllers\HomeController::class);
Route::get('/categories', App\Controllers\CategoryController::class);
