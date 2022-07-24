<?php

use Illuminate\Support\Facades\Route;


Route::middleware('guest:admin')->group(function() {
    Route::get('login', [
        \App\Http\Controllers\Admin\AuthController::class, 'index'
    ])->name('login');
    Route::post('login_process', [
        \App\Http\Controllers\Admin\AuthController::class, 'login'
    ])->name('login_process');
});


Route::middleware('auth:admin')->group(function(){
    Route::resource('books', \App\Http\Controllers\Admin\BookController::class);
    Route::resource('authors', \App\Http\Controllers\Admin\AuthorController::class);

    Route::get('/',[
        \App\Http\Controllers\Admin\IndexController::class, 'index'
    ])->name('main');

    Route::get('logout', [
        \App\Http\Controllers\Admin\AuthController::class, 'logout'
    ])->name('logout');
});

