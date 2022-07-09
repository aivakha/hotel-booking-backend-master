<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


Auth::routes(['verify' => true, 'register'=> false, 'login'=> false]);

Route::group([
    'middleware' => ['admin', 'auth', 'verified']
], function() {
    Route::get('/admin', 'App\Http\Controllers\IndexController@index');
    Route::resource('/admin/features', 'App\Http\Controllers\FeatureController');
    Route::resource('/admin/cities', 'App\Http\Controllers\CityController');
    Route::resource('/admin/distances', 'App\Http\Controllers\DistanceController');
    Route::resource('/admin/managers', 'App\Http\Controllers\ManagerController');
    Route::resource('/admin/apartment-types', 'App\Http\Controllers\ApartmentTypeController');
    Route::resource('/admin/leisure-activities', 'App\Http\Controllers\LeisureActivityController');
    Route::resource('/admin/bed-types', 'App\Http\Controllers\BedTypeController');
    Route::resource('/admin/meals', 'App\Http\Controllers\MealController');
    Route::resource('/admin/rooms', 'App\Http\Controllers\RoomController');
    Route::resource('/admin/apartments', 'App\Http\Controllers\ApartmentController');
    Route::resource('/admin/bookings', 'App\Http\Controllers\BookingController');


    Route::get('/admin/account', 'App\Http\Controllers\UserController@edit')->name('account');
    Route::put('/admin/account', 'App\Http\Controllers\UserController@update')->name('account.update');


    Route::resource('/admin/roles', 'App\Http\Controllers\RoleController')->middleware('role:super_user');
});

Route::group([
    'middleware' => 'auth'
], function() {
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
});

Route::group([
    'middleware' => 'guest'
], function() {
    Route::get('/registration', 'App\Http\Controllers\AuthController@registrationForm')->name('registration');
    Route::post('/registration', 'App\Http\Controllers\AuthController@registration');
    Route::get('/login', 'App\Http\Controllers\AuthController@loginForm')->name('login');
    Route::post('/login', 'App\Http\Controllers\AuthController@login');
});


Route::get('/test', 'App\Http\Controllers\TestController@index');
