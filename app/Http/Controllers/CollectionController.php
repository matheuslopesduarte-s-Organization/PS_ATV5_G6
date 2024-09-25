<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Books;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
        $genreId = $request->input('genre_id');

        $books = Books::with('genre')
            ->when($genreId, function ($query) use ($genreId) {
                return $query->where('genre_id', $genreId);
            })
            ->paginate(10);

        return Inertia::render('acervoView', [
            'books' => BookResource::collection($books),
            'genres' => [],
            'selectedGenre' => $genreId,
        ]);
    }

    public function show($isbn)
    {
        $book = Books::where('isbn', $isbn)->firstOrFail();

        return Inertia::render('livroView', [
            'book' => new BookResource($book),
        ]);
    }   
}
