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



//Route::get('/hotels', function () {
//    return view('admin.hotels.index');
//});
//
//Route::get('/hotels/create', function () {
//    return view('admin.hotels.create');
//});
//
//Route::get('/hotels/edit', function () {
//    return view('admin.hotels.edit');
//});
//
//Route::get('/bookings', function () {
//    return view('admin.bookings.index');
//});
//
//Route::get('/bookings/create', function () {
//    return view('admin.bookings.create');
//});
//
//Route::get('/bookings/edit', function () {
//    return view('admin.bookings.edit');
//});
//
//
//Route::get('/features', function () {
//    return view('admin.features.index');
//});
//
//Route::get('/features/create', function () {
//    return view('admin.features.create');
//});
//
//Route::get('/features/edit', function () {
//    return view('admin.features.edit');
//});
//
//
//Route::get('/distances', function () {
//    return view('admin.distances.index');
//});
//
//Route::get('/distances/create', function () {
//    return view('admin.distances.create');
//});
//
//Route::get('/distances/edit', function () {
//    return view('admin.distances.edit');
//});
//
//
//Route::get('/amenities', function () {
//    return view('admin.amenities.index');
//});
//
//Route::get('/amenities/create', function () {
//    return view('admin.amenities.create');
//});
//
//Route::get('/amenities/edit', function () {
//    return view('admin.amenities.edit');
//});





//Route::get('/', 'App\Http\Controllers\HomeController@index');
//Route::get('/post/{slug}', 'App\Http\Controllers\HomeController@single')->name('post.single');
//Route::get('/tag/{slug}', 'App\Http\Controllers\HomeController@tag')->name('tag.single');
//Route::get('/category/{slug}', 'App\Http\Controllers\HomeController@category')->name('category.single');
//Route::post('/subscribe', 'App\Http\Controllers\SubscribeController@subscribe');
//Route::get('/verify/{token}', 'App\Http\Controllers\SubscribeController@verify');
//// R E G I S T R A T I O N  AND  L O G I N
//
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




