<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entrenador
 *
 * @property $id
 * @property $NIF
 * @property $Nombre
 * @property $Apellidos
 * @property $FechaNac
 * @property $Sueldo
 * @property $gimnasio_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Gimnasio $gimnasio
 * @property Clase[] $clases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Entrenador extends Model
{

    protected $table = 'entrenador';


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['NIF', 'Nombre', 'Apellidos', 'FechaNac', 'Sueldo', 'gimnasio_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gimnasio()
    {
        return $this->belongsTo(\App\Models\Gimnasio::class, 'gimnasio_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clases()
    {
        return $this->hasMany(\App\Models\Clase::class, 'id', 'entrenador_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($entrenador) {
            $entrenador->clases()->delete();
        });
    }


}
