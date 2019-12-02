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

    /*
     * PROJECTS
     */
    // Route::get('/projects', 'Project\ProjectController@index');
    // Route::post('/project', 'Project\ProjectController@store');
    // Route::get('/project/{id}', 'Project\ProjectController@show')->where('id', '[0-9]+');
    // Route::post('/project/{id}', 'Project\ProjectController@update')->where('id', '[0-9]+');
    // Route::delete('/project/{id}', 'Project\ProjectController@destroy')->where('id', '[0-9]+');
    Route::get('/complete', 'Project\ProjectController@complete');
    Route::apiResource('projects', 'Project\ProjectController');
    Route::apiResource('lists', 'ListTask\ListTaskController');
    Route::apiResource('tasks', 'Task\TaskController');
    
});

