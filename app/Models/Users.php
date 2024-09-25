<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'cpf';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'cpf',
        'name',
        'email',
        'date_of_birth',
        'guardian_cpf',
        'password',
        'user_type'
    ];

    protected $hidden = [
        'password',
        'cpf'
    ];

    public function loans()
    {
        return $this->hasMany(Loans::class);
    }

    public function penalties()
    {
        return $this->hasMany(Penalties::class);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
