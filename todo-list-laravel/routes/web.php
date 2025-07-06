<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => response()->redirectToRoute('todo.index'));

Route::prefix('/auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->middleware('guest')
        ->name('login');

    Route::post('/login', [AuthController::class, 'handleLogin'])
        ->middleware('guest');

    Route::post('/logout', [AuthController::class, 'handleLogout'])
        ->middleware('auth')
        ->name('logout');
});

Route::resource('/todo', TodoController::class)->except("show");
