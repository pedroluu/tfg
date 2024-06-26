<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        'NIF',
        'Nombre',
        'Apellidos',
        'FechaNac',
        'Email',
        'Usuario',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function gimnasios()
    {
        return $this->belongsToMany(Gimnasio::class, 'dirige');
    }
}
