<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('homeView');
})->name('home');

Route::get('/acervo', function () {
    return Inertia::render('acervoView');
})->name('acervo');

Route::get('/seusLivros', function () {
    return Inertia::render('seusLivrosView');
})->name('seusLivros');

Route::get('/cadastrar', function () {
    return Inertia::render('cadastroView');
})->name('cadastrar');

Route::get('/login', function () {
    return Inertia::render('loginView');
})->name('login');

Route::get('/acervo/livro/{id}', function () {
    return Inertia::render('acervoSingleView');
})->name('acervo.single');


Route::get('/admin/usuarios', function () {
    return Inertia::render('admin/adminUsuariosView');
})->name('admin.usuarios');

Route::get('/admin/usuario/{id}', function () {
    return Inertia::render('admin/adminUsuarioView');
})->name('admin.usuario');

Route::get('/admin/acervo', function () {
    return Inertia::render('admin/adminAcervoView');
})->name('admin.acervo');

Route::get('/admin/acervo/adicionar', function () {
    return Inertia::render('admin/adminAcervoAdicionarView');
})->name('admin.acervo.adicionar');

Route::get('/admin/acervo/editar/{id}', function () {
    return Inertia::render('admin/adminLivroView');
})->name('acervo.acervo.editar');

Route::get('/admin/acervo/livro/{id}', function () {
    return Inertia::render('admin/adminAcervoSingle');
})->name('admin.livro');
// require __DIR__.'/auth.php';
