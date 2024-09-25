<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Books;
use App\Models\Genres;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CollectionController extends Controller
{
    public function index()
    {
        $genres = Genres::with('books')->get();

        $genresWithBooks = $genres->map(function ($genre) {
            return [
                'id' => $genre->id,
                'name' => $genre->name,
                'books' => BookResource::collection($genre->books) 
            ];
        });

        return Inertia::render('acervoView', [
            'genres' => $genresWithBooks, 
        ]);
    }

    public function show($isbn)
    {
        $book = Books::where('isbn', $isbn)->firstOrFail();

        return Inertia::render('acervoSingleView', [
            'book' => new BookResource($book),
        ]);
    }
}
