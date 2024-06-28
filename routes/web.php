<?php

use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [HomeController::class, 'home'])->name('site.home');

Auth::routes();

Route::match(['get', 'post'], 'logout', [LoginController::class, 'logout']);

Route::name('adm.')->group(function () {
    Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
    Route::resource('posts', PostController::class)->except('show');
});
