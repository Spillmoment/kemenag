<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Auth\LoginController@index');

Auth::routes();

Route::prefix('user')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::put('/profile', 'ProfileController@update')->name('profile.update');
        Route::get('/files', 'ProfileController@files')->name('files');
        Route::put('/files', 'ProfileController@updateFile')->name('files.update');
        Route::get('/about', function () {
            return view('about');
        })->name('about');
    });

Route::prefix('admin')
    ->middleware('admin')
    ->group(function () {
        Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
        Route::get('/profile', 'Admin\DashboardController@profile')->name('admin.profil');
        Route::put('/profile', 'Admin\DashboardController@update_profile')->name('admin.profile');
        Route::get('/pendaftar', 'Admin\PendaftarController@baru')->name('pendaftar.baru');
        Route::get('/pendaftar/tpa-tpq', 'Admin\PendaftarController@tpa')->name('pendaftar.tpa');
        Route::get('/pendaftar/madin', 'Admin\PendaftarController@madin')->name('pendaftar.madin');
        Route::get('/pendaftar/majelis-taklim', 'Admin\PendaftarController@majelis_taklim')->name('pendaftar.majlis');
        Route::get('/pendaftar/{id}', 'Admin\PendaftarController@detail')->name('pendaftar.detail');
        Route::put('/pendaftar/{id}', 'Admin\PendaftarController@confirm')->name('pendaftar.confirm');
        Route::delete('/pendaftar/{id}', 'Admin\PendaftarController@destroy')->name('pendaftar.destroy');
        Route::post('/surat/upload/{id}', 'Admin\SuratController@store')->name('surat.upload');
        Route::put('/surat/upload/{id}', 'Admin\SuratController@update')->name('surat.update');
    });
