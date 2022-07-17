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
    'middleware' => ['admin', 'verified'],
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin'
], function() {
    Route::get('/', 'IndexController@index')->name('dashboard');

    Route::get('/account', 'UserController@edit')->name('account');
    Route::put('/account', 'UserController@update')->name('account.update');

    Route::get('/comments', 'CommentController@index')->name('comments.index');
    Route::get('/comments/update/{id}', 'CommentController@update')->name('comments.update');
    Route::delete('/comments/destroy/{id}', 'CommentController@destroy')->name('comments.destroy');

    Route::resource('/features', 'FeatureController');
    Route::resource('/cities', 'CityController');
    Route::resource('/distances', 'DistanceController');
    Route::resource('/managers', 'ManagerController');
    Route::resource('/apartment-types', 'ApartmentTypeController');
    Route::resource('/leisure-activities', 'LeisureActivityController');
    Route::resource('/bed-types', 'BedTypeController');
    Route::resource('/meals', 'MealController');
    Route::resource('/rooms', 'RoomController');
    Route::resource('/apartments', 'ApartmentController');
    Route::resource('/bookings', 'BookingController');
    Route::resource('/roles', 'RoleController')->middleware('role:super_user');
});

Route::group([
    'middleware' => 'auth'
], function() {
    Route::get('/logout', 'App\Http\Controllers\Admin\AuthController@logout')->name('logout');
    Route::post('/comment', 'App\Http\Controllers\CommentController@store')->name('comments.store');
});

Route::group([
    'middleware' => 'guest'
], function() {
    Route::get('/register', 'App\Http\Controllers\Admin\AuthController@registerForm')->name('register');
    Route::post('/register', 'App\Http\Controllers\Admin\AuthController@register')->name('register');
    Route::get('/login', 'App\Http\Controllers\Admin\AuthController@loginForm')->name('login');
    Route::post('/login', 'App\Http\Controllers\Admin\AuthController@login')->name('login');
});

Route::get('/{any}', '\App\Http\Controllers\Client\SpaController@index')->where('any', '.*');
