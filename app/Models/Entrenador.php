<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;

    protected $table = 'entrenador';

    protected $fillable = [
        'NIF',
        'Nombre',
        'Apellidos',
        'FechaNac',
        'Sueldo',
        'gimnasio_id'
    ];

    public function gimnasio()
    {
        return $this->belongsTo(Gimnasio::class);
    }

    public function clases()
    {
        return $this->hasMany(Clase::class);
    }
}
