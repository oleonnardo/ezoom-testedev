<?php

use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [HomeController::class, 'home'])->name('site.home');

Auth::routes();

Route::match(['get', 'post'], 'logout', [LoginController::class, 'logout']);

Route::name('adm.')->middleware('auth')->group(function () {
    Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
    Route::resource('posts', PostController::class)->except('show');
    Route::resource('categories', CategoryController::class)->except('show', 'destroy');

    Route::prefix('post')->name('posts.')->controller(PostController::class)->group(function () {
        Route::post('{post}/active', 'activeToggle')->name('activeToggle');
        Route::post('{post}/highlight', 'highlightToggle')->name('highlightToggle');
    });

    Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function () {
        Route::post('{category}/active', 'activeToggle')->name('activeToggle');
        Route::post('{category}/highlight', 'highlightToggle')->name('highlightToggle');
    });
});
