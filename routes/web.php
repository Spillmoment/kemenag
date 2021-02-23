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
        Route::get('/pendaftar/tpa', 'Admin\PendaftarController@tpa')->name('pendaftar.tpa');
        Route::get('/pendaftar/tpq', 'Admin\PendaftarController@tpq')->name('pendaftar.tpq');
        Route::get('/pendaftar/diniyah', 'Admin\PendaftarController@diniyah')->name('pendaftar.diniyah');
        Route::get('/pendaftar/{id}', 'Admin\PendaftarController@detail')->name('pendaftar.detail');
        Route::put('/pendaftar/{id}', 'Admin\PendaftarController@confirm')->name('pendaftar.confirm');
        Route::post('/surat/upload/{id}', 'Admin\SuratController@store')->name('surat.upload');
        Route::put('/surat/upload/{id}', 'Admin\SuratController@update')->name('surat.update');
    });
