<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $primaryKey = 'isbn';

    protected $fillable = [
        'isbn',
        'titulo',
        'autor',
        'classificacao',
        'sinopse',
        'capa',
        'estoque',
        'genero_id'
    ];

    public function genero()
    {
        return $this->belongsTo(Generos::class, 'genero_id', 'id');
    }

    public function emprestimos()
    {
        return $this->hasMany(Emprestimos::class, 'livro_isbn', 'isbn');
    }
}
