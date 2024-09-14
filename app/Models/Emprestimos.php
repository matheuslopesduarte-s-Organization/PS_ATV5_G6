<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimos extends Model
{
    use HasFactory;

    protected $table = 'emprestimos';

    protected $fillable = [
        'usuario_cpf',
        'livro_isbn',
        'data_emprestimo',
        'data_devolucao',
        'status',
        'prazo_devolucao'
    ];

    public function livro()
    {
        return $this->belongsTo(Livros::class, 'livro_isbn', 'isbn');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_cpf', 'cpf');
    }

    public function penalidades()
    {
        return $this->hasMany(Penalidades::class, 'emprestimo_id', 'id');
    }
}
