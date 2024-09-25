<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\BookResource;
use App\Http\Requests\Admin\BookRequest;
use App\Models\Books;
use App\Models\Genres;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\http\Controllers\Controller;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $books = Books::with('genre')->paginate(1);
        return Inertia::render('admin/adminAcervoView', [
            'books' => BookResource::collection($books),
        ]);
    }

    public function create()
    {
        $genres = Genres::all();
        return Inertia::render('admin/adminAcervoAdicionarView', [
            'genres' => $genres,
        ]);
    }

    public function report($isbn) 
    {
        $book = Books::where('isbn', $isbn)->firstOrFail();   

        $loans = $book->loans()->paginate(10);

        return Inertia::render('admin/adminAcervoSingle', [
            'book' => new BookResource($book),
            'loans' => $loans,
        ]);
    }

    public function store(BookRequest $request)
    {
    
        Books::create($request->all());

        return redirect()->route('admin.acervo')->with('success', 'Livro adicionado com sucesso!');
    }

    public function edit($isbn)
    {
        $book = Books::where('isbn', $isbn)->firstOrFail();

        $genres = Genres::all();

        return inertia('admin/adminLivroView', [
            'book' => $book,
            'genres' => $genres,
        ]);
    }


    public function update(BookRequest $request, $isbn)
    {
        $book = Books::where('isbn', $isbn)->firstOrFail();

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->classification = $request->input('classification');
        $book->synopsis = $request->input('synopsis');
        $book->stock = $request->input('stock');
        $book->genre_id = $request->input('genre_id');
        $book->cover = $request->input('cover');

        $book->save();

        // Redireciona para a lista com uma mensagem de sucesso
        return redirect()->route('admin.acervo')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy($isbn)
    {
        $book = Books::where('isbn', $isbn)->firstOrFail();
        $book->delete();

        return redirect()->route('admin.acervo')->with('success', 'Livro deletado com sucesso!');
    }
}
