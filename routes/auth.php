<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(callback: function (): void {
    Route::get(uri: '/login', action: [Auth\LoginController::class,'index'])->name(name: 'login');
    Route::post(uri: '/login', action: [Auth\LoginController::class,'store'])->name(name: 'login');

    Route::get(uri: '/cadastrar', action: [Auth\RegisterController::class,'index'])->name(name: 'cadastrar');
    Route::post(uri: '/cadastrar', action: [Auth\RegisterController::class,'store'])->name(name: 'cadastrar');
});
Route::middleware('auth')->group(callback: function (): void {
    Route::post(uri: '/logout', action: [Auth\LoginController::class,'destroy'])->name(name: 'logout');
});