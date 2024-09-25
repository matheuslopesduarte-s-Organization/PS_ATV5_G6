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

Route::get('/emprestimos', [LoanController::class, 'index'])->name('loans.index');
Route::get('/emprestimos/criar/{id}', [LoanController::class, 'create'])->name('loans.create');
Route::post('/emprestimos/criar/{id}', [LoanController::class, 'store'])->name('loans.store');
Route::get('/emprestimos/{id}', [LoanController::class, 'show'])->name('loans.show');


Route::get(uri: '/acervo', action: [CollectionController::class, 'index'])->name(name: 'acervo');
Route::get(uri: '/acervo/livro/{id}', action: [CollectionController::class, 'show'])->name(name: 'acervo.single');



require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
