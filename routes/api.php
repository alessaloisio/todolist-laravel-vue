<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::middleware('auth:api')->group(function () {
    // Logout
    Route::get('/logout', 'Auth\AuthController@logout');
    // User
    Route::get('/user', 'User\UserController@show');
    Route::post('/user', 'User\UserController@update');
    
});

