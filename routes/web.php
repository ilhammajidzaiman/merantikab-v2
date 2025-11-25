<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::prefix('/')->controller(Controllers\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::prefix('/berita')->controller(Controllers\NewsController::class)->group(function () {
    Route::get('/', 'index')->name('news.index');
    Route::get('/{id}', 'show')->name('news.show');
});

Route::prefix('/info-pengumuman')->controller(Controllers\AnnouncementController::class)->group(function () {
    Route::get('/', 'index')->name('announcement.index');
    Route::get('/{id}', 'show')->name('announcement.show');
});

Route::prefix('/tautan-aplikasi')->controller(Controllers\AppListController::class)->group(function () {
    Route::get('/', 'index')->name('app-list.index');
});

Route::prefix('/publikasi-dokumen')->controller(Controllers\DocumentController::class)->group(function () {
    Route::get('/', 'index')->name('document.index');
    Route::get('/{id}', 'show')->name('document.show');
    Route::get('/download/{id}', 'download')->name('document.download');
});

Route::prefix('/galeri')->controller(Controllers\GaleryController::class)->group(function () {
    Route::get('/', 'index')->name('galery.index');
});

Route::prefix('/selayang-pandang')->controller(Controllers\ProfileController::class)->group(function () {
    Route::get('/', 'index')->name('profile.index');
});

Route::prefix('/kepemimpinan')->controller(Controllers\LeaderController::class)->group(function () {
    Route::get('/', 'index')->name('leader.index');
});
