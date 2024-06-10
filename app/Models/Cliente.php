<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    use HasFactory;

    protected $table = 'cliente'; // Nombre correcto de la tabla

    protected $fillable = [
        'Nombre',
        'Apellidos',
        'FechaNac',
        'Cuota',
        'Email',
        'Usuario',
        'password',
        'gimnasio_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function gimnasio()
    {
        return $this->belongsTo(Gimnasio::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function clases()
    {
        return $this->belongsToMany(Clase::class, 'realiza');
    }
}

