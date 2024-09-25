<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalties extends Model
{
    use HasFactory;

    protected $table = 'penalties';

    protected $fillable = [
        'loan_id',
        'user_cpf',
        'start_date',
        'end_date'
    ];

    public function loan()
    {
        return $this->belongsTo(Loans::class, 'loan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_cpf', 'cpf');
    }
}
