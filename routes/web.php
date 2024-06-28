<?php

use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PostController;

Route::get('/', [HomeController::class, 'home'])->name('site.home');

Auth::routes();

Route::name('adm.')->group(function () {
    Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
    Route::resource('posts', PostController::class)->except('show');
});
