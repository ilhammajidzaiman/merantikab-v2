<?php

use App\Http\Controllers\Public;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::prefix('/')->controller(Public\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});
