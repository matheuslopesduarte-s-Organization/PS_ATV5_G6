<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genres;
use App\Http\Requests\Admin\GenreRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Inertia\Inertia;

class GenresController extends Controller
{
    public function store(GenreRequest $request)
    {
        $genre = Genres::create([
            'name' => $request->name,
        ]);

         redirect()->back()->with('success', 'Gênero criado com sucesso!');
    }

    public function destroy(Genres $genre)
    {
        if ($genre->books()->exists()) {
           return redirect()->back()->withErrors(['error' => 'Não é possível deletar um gênero com livros associados!']);
        }
        $genre->delete();
        return redirect()->back()->with('success', 'Gênero deletado com sucesso!');

    }

}