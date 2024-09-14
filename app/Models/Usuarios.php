<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'cpf',
        'nome',
        'email',
        'data_nascimento',
        'responsavel_cpf',
        'senha',
        'tipo_usuario'
    ];

    protected $hidden = [
        'senha',
        'tipo_usuario'
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
        
    }
}
