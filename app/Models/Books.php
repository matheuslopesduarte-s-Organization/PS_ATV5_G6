<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'isbn';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'isbn',
        'title',
        'author',
        'classification',
        'synopsis',
        'cover',
        'stock',
        'genre_id'
    ];

    public function genre()
    {
        return $this->belongsTo(Genres::class, 'genre_id', 'id');
    }

    public function loans()
    {
        return $this->hasMany(Loans::class, 'book_isbn', 'isbn');
    }
}
