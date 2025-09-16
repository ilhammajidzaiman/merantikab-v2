<?php

use App\Http\Controllers\Public;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::prefix('/')->controller(Public\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::prefix('/news')->controller(Public\NewsController::class)->group(function () {
    Route::get('/', 'index')->name('news.index');
    Route::get('/{id}', 'show')->name('news.show');
});
