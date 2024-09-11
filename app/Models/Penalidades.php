<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalidades extends Model
{
    use HasFactory;

    protected $table = 'penalidades';

    protected $fillable = [
        'emprestimo_id',
        'usuario_cpf',
        'data_inicio',
        'data_final'
    ];

    public function emprestimo()
    {
        return $this->belongsTo(Emprestimos::class, 'emprestimo_id', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_cpf', 'cpf');
    }

}
