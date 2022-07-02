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

Route::get('/admin', 'App\Http\Controllers\IndexController@index');

Route::resource('/admin/features', 'App\Http\Controllers\FeatureController');
Route::resource('/admin/cities', 'App\Http\Controllers\CityController');
Route::resource('/admin/distances', 'App\Http\Controllers\DistanceController');
Route::resource('/admin/managers', 'App\Http\Controllers\ManagerController');
Route::resource('/admin/apartment-types', 'App\Http\Controllers\ApartmentTypeController');
Route::resource('/admin/leisure-activities', 'App\Http\Controllers\LeisureActivityController');
Route::resource('/admin/bed-types', 'App\Http\Controllers\BedTypeController');
Route::resource('/admin/meals', 'App\Http\Controllers\MealController');

// R E G I S T R A T I O N  AND  L O G I N
//Route::group([
//    'middleware' => 'admin'
//], function() {
//    // A D M I N - B A C K E N D
//    Route::get('/admin', 'App\Http\Controllers\Admin\DashboardController@index');
//    Route::resource('/admin/categories', 'App\Http\Controllers\Admin\CategoriesController');
//    Route::resource('/admin/tags', 'App\Http\Controllers\Admin\TagsController');
//    Route::resource('/admin/users', 'App\Http\Controllers\Admin\UsersController');
//    Route::resource('/admin/posts', 'App\Http\Controllers\Admin\PostsController');
//    Route::resource('/admin/subscribers', 'App\Http\Controllers\Admin\SubscribersController');
//
//    // C O M M E N T
//    Route::post('/comment', 'App\Http\Controllers\CommentsController@store');
//
//    Route::get('/admin/comments', 'App\Http\Controllers\Admin\CommentsController@index')->name('admin.comments');
//    Route::get('/admin/comments/toggle/{id}', 'App\Http\Controllers\Admin\CommentsController@toggle');
//    Route::delete('/admin/comments/destroy/{id}', 'App\Http\Controllers\Admin\CommentsController@destroy')->name('comments.destroy');
//
//});
//
//
//Route::group([
//    'middleware' => 'auth'
//], function() {
//    Route::resource('/profile', 'App\Http\Controllers\ProfileController');
//    Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
//});
//
//Route::group([
//    'middleware' => 'guest'
//], function() {
//    Route::get('/register', 'App\Http\Controllers\AuthController@registerForm');
//    Route::post('/register', 'App\Http\Controllers\AuthController@register');
//    Route::get('/login', 'App\Http\Controllers\AuthController@loginForm')->name('login');
//    Route::post('/login', 'App\Http\Controllers\AuthController@login');
//});
//




