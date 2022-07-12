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


Route::get('/user', \App\Http\Controllers\API\User\IndexController::class);
Route::post('/rooms', \App\Http\Controllers\API\Room\IndexController::class);
Route::get('/rooms/filters', \App\Http\Controllers\API\Room\FilterListController::class);
Route::get('/rooms/{slug}', \App\Http\Controllers\API\Room\ShowController::class);
Route::get('/apartments/{slug}', \App\Http\Controllers\API\Apartment\ShowController::class);
Route::get('/random-rooms', \App\Http\Controllers\API\Room\MostViewedController::class);
Route::get('/random-apartments', \App\Http\Controllers\API\Apartment\MostViewedController::class);



// API route for register new user
// Route::post('/register', [App\Http\Controllers\API\Auth\AuthController::class, 'register']);
// Route::post('/login', [App\Http\Controllers\API\Auth\AuthController::class, 'login']);

Route::post('/rooms', \App\Http\Controllers\API\Room\IndexController::class);
Route::post('/comment', [\App\Http\Controllers\API\Comment\CommentController::class, 'store']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', [App\Http\Controllers\API\Auth\AuthController::class, 'user']);
});

