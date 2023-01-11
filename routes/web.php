<?php

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

Route::get('/', function () {
    return view('login');
});

Route::resource('user', UserController::class);

Route::get('home', 'App\Http\Controllers\UserController@home')->name('home');
Route::get('login', 'App\Http\Controllers\UserController@login')->name('login');
Route::get('register', 'App\Http\Controllers\UserController@register')->name('register');
Route::get('aboutus', 'App\Http\Controllers\UserController@aboutus')->name('aboutus');