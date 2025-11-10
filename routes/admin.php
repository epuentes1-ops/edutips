<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


// Route::resource('categories', CategoryController::class);
// Route::resource('users', UserController::class);

Route::middleware(['auth', 'role:Administrador|Editor'])
    ->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('reports', CategoryController::class);
    });