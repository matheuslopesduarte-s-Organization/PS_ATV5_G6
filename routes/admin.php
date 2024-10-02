<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RequireAdmin;
use Inertia\Inertia;

Route::prefix('admin')->middleware([RequireAdmin::class])->group(function () {
    Route::get('/acervo', [Admin\BooksController::class, 'index'])->name('admin.acervo');
    Route::get('/acervo/adicionar', [Admin\BooksController::class, 'create'])->name('admin.acervo.adicionar');
    Route::post('/acervo/adicionar', [Admin\BooksController::class, 'store'])->name('admin.acervo.store');
    Route::get('/acervo/{id}/edit', [Admin\BooksController::class, 'edit'])->name('admin.acervo.edit');
    Route::get('/acervo/livro/{id}', [Admin\BooksController::class, 'report'])->name('admin.livro');
    Route::put('/acervo/{id}', [Admin\BooksController::class, 'update'])->name('admin.acervo.update');
    Route::delete('/acervo/{id}', [Admin\BooksController::class, 'destroy'])->name('admin.acervo.destroy');

    Route::get('/emprestimos',  [Admin\LoanController::class, 'index'])->name('admin.emprestimos');
    Route::get('/emprestimo/{id}', [Admin\LoanController::class, 'show'])->name('admin.emprestimo');


    Route::post('/genres', [Admin\GenresController::class, 'store'])
        ->name('genres.store'); 
    Route::delete('/genres/{genre}', [Admin\GenresController::class, 'destroy'])
        ->name('admin.acervo.genre.delete'); 

    Route::get('/usuarios', [Admin\UsersController::class, 'index'])->name('admin.usuarios');
    Route::get('/usuario/{id}', [Admin\UsersController::class, 'show'])->name('admin.usuario');

});