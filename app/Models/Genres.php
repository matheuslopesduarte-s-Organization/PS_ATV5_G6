<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;

    protected $table = 'genres';

    protected $fillable = [
        'name'
    ];

    public function books()
    {
        return $this->hasMany(Books::class, 'genre_id', 'id');
    }
}
