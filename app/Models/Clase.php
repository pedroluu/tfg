<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Clase
 *
 * @property $id
 * @property $Nombre
 * @property $ejercicios
 * @property $capacidad
 * @property $entrenador_id
 * @property $created_at
 * @property $updated_at
 * @property $hora
 * @property $dia
 *
 * @property Entrenador $entrenador
 * @property Realiza[] $realizas
 * @property Reserva[] $reservas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Clase extends Model
{

    protected $table = 'clase';

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre', 'ejercicios', 'capacidad', 'entrenador_id', 'hora', 'dia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entrenador()
    {
        return $this->belongsTo(\App\Models\Entrenador::class, 'entrenador_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function realizas()
    {
        return $this->hasMany(\App\Models\Realiza::class, 'id', 'clase_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservas()
    {
        return $this->hasMany(\App\Models\Reserva::class, 'id', 'clase_id');
    }


}
