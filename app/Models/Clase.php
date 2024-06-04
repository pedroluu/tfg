<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $table = 'clase';

    protected $fillable = [
        'hora',
        'dia',
        'Nombre',
        'ejercicios',
        'capacidad',
        'entrenador_id'
    ];

    public function entrenador()
    {
        return $this->belongsTo(Entrenador::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'realiza');
    }
}
