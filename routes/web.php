<?php

use App\Http\Controllers\Public;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::prefix('/')->controller(Public\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::prefix('/berita')->controller(Public\NewsController::class)->group(function () {
    Route::get('/', 'index')->name('news.index');
    Route::get('/{id}', 'show')->name('news.show');
});

Route::prefix('/info-pengumuman')->controller(Public\InformationController::class)->group(function () {
    Route::get('/', 'index')->name('information.index');
    Route::get('/{id}', 'show')->name('information.show');
});

Route::prefix('/tautan-aplikasi')->controller(Public\LinkController::class)->group(function () {
    Route::get('/', 'index')->name('link.index');
    Route::get('/{id}', 'show')->name('link.show');
});

Route::prefix('/publikasi-dokumen')->controller(Public\DocumentController::class)->group(function () {
    Route::get('/', 'index')->name('document.index');
    Route::get('/{id}', 'show')->name('document.show');
    Route::get('/download/{id}', 'download')->name('document.download');
});

Route::prefix('/galeri')->controller(Public\GaleryController::class)->group(function () {
    Route::get('/', 'index')->name('galery.index');
});

Route::prefix('/selayang-pandang')->controller(Public\ProfileController::class)->group(function () {
    Route::get('/', 'index')->name('profile.index');
});

Route::prefix('/kepemimpinan')->controller(Public\LeaderController::class)->group(function () {
    Route::get('/', 'index')->name('leader.index');
});

Route::prefix('/user')->controller(Public\UserController::class)->group(function () {
    Route::get('/', 'index')->name('user.index');
});
