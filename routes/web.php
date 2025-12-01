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

Route::prefix('/halaman')->controller(Controllers\PageController::class)->group(function () {
    Route::get('/', 'index')->name('page.index');
    Route::get('/{id}', 'show')->name('page.show');
});

Route::prefix('/info-pengumuman')->controller(Controllers\AnnouncementController::class)->group(function () {
    Route::get('/', 'index')->name('announcement.index');
    Route::get('/{id}', 'show')->name('announcement.show');
});

Route::prefix('/tautan-aplikasi')->controller(Controllers\AppListController::class)->group(function () {
    Route::get('/', 'index')->name('app-list.index');
});

Route::prefix('/publikasi-dokumen')->controller(Controllers\FileController::class)->group(function () {
    Route::get('/', 'index')->name('file.index');
    Route::get('/{id}', 'show')->name('file.show');
    Route::get('/download/{file}', 'download')->name('file.download')->where('file', '.*');
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
