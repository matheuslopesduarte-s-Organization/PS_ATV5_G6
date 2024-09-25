<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = [
        'users_cpf',
        'book_isbn',
        'loan_date',
        'return_date',
        'status',
        'return_deadline'
    ];

    public function book()
    {
        return $this->belongsTo(Books::class, 'book_isbn', 'isbn');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'users_cpf', 'cpf');
    }

    public function penalties()
    {
        return $this->hasMany(Penalties::class, 'loan_id', 'id');
    }
}
