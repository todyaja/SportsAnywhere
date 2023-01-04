<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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


Route::resource('user', UserController::class);

Route::get('/', 'App\Http\Controllers\UserController@home')->name('home');
Route::get('login', 'App\Http\Controllers\UserController@login')->name('login');
Route::get('register', 'App\Http\Controllers\UserController@register')->name('register');
Route::post('registeruser','App\Http\Controllers\UserController@create')->name('registeruser');
Route::post('loginprocess', 'App\Http\Controllers\UserController@loginProcess')->name('loginprocess');
Route::post('logout', 'App\Http\Controllers\UserController@logout')->name('logout');
Route::get('/myarea', 'App\Http\Controllers\AreaController@myarea')->name('myarea');
Route::resource('search', SearchController::class);
Route::resource('bookings', BookingController::class);
Route::get('profile', 'App\Http\Controllers\UserController@profile')->name('profile');
Route::get('areaPage/{areaId}', [AreaController::class, 'show']);
Route::get('/areaBookingPage/{areaId}', [BookingController::class, 'areaBookingNeededData']);
