<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('web')->group(function () {

Route::get('/', function () {
    return Inertia::render('homeView', [
        'success' => session('success'),
    ]);
})->name('home');

Route::get('/seusLivros', function () {
    return Inertia::render('seusLivrosView');
})->name('seusLivros');

});


Route::get(uri: '/acervo', action: [CollectionController::class, 'index'])->name(name: 'acervo');
Route::get('/acervo/livro/{id}', action: [CollectionController::class, 'show'])->name(name: 'acervo.single');

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
