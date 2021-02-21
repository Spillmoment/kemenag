<?php

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

Route::get('/', 'Auth\LoginController@index');

Auth::routes();

Route::prefix('user')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::put('/profile', 'ProfileController@update')->name('profile.update');
        Route::get('/about', function () {
            return view('about');
        })->name('about');
    });

Route::prefix('admin')
    ->middleware('admin')
    ->group(function () {
        Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    });
