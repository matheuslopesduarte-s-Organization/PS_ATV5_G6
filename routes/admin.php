<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RequireAdmin;

Route::prefix('admin')->middleware([RequireAdmin::class])->group(function () {
    Route::get('/acervo', [Admin\BooksController::class, 'index'])->name('admin.acervo');
    Route::get('/acervo/adicionar', [Admin\BooksController::class, 'create'])->name('admin.acervo.adicionar');
    Route::post('/acervo/adicionar', [Admin\BooksController::class, 'store'])->name('admin.acervo.store');
    Route::get('/acervo/{id}/edit', [Admin\BooksController::class, 'edit'])->name('admin.acervo.edit');
    Route::get('/acervo/livro/{id}', [Admin\BooksController::class, 'report'])->name('admin.livro');
    Route::put('/acervo/{id}', [Admin\BooksController::class, 'update'])->name('admin.acervo.update');
    Route::delete('/acervo/{id}', [Admin\BooksController::class, 'destroy'])->name('admin.acervo.destroy');

    Route::post('/genres', [Admin\GenresController::class, 'store'])
        ->name('genres.store'); 
    Route::delete('/genres/{genre}', [Admin\GenresController::class, 'destroy'])
        ->name('genres.destroy'); 

    Route::get('/usuarios', [Admin\UsersController::class, 'index'])->name('admin.usuarios');
    Route::get('/usuarios/{id}', [Admin\UsersController::class, 'show'])->name('admin.usuario');

});