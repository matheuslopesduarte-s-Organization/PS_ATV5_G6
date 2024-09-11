<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generos extends Model
{
    use HasFactory;

    protected $table = 'generos';

    protected $fillable = [
        'nome'
    ];

    public function livros()
    {
        return $this->hasMany(Livros::class, 'genero_id', 'id');
    }
}
