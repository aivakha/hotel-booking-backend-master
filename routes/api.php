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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/rooms', \App\Http\Controllers\API\Room\IndexController::class);
Route::get('/rooms/filters', \App\Http\Controllers\API\Room\FilterListController::class);
Route::get('/rooms/{slug}', \App\Http\Controllers\API\Room\ShowController::class);
Route::get('/apartments/{slug}', \App\Http\Controllers\API\Apartment\ShowController::class);
