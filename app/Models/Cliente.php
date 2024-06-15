<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class Cliente
 *
 * @property $id
 * @property $Nombre
 * @property $Apellidos
 * @property $FechaNac
 * @property $Cuota
 * @property $Email
 * @property $Usuario
 * @property $password
 * @property $gimnasio_id
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Gimnasio $gimnasio
 * @property Reserva[] $reservas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Authenticatable
{
    use Notifiable;

    protected $table = 'cliente';

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre', 'Apellidos', 'FechaNac', 'Cuota', 'Email', 'Usuario', 'password', 'gimnasio_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gimnasio()
    {
        return $this->belongsTo(\App\Models\Gimnasio::class, 'gimnasio_id', 'id');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservas()
    {
        return $this->hasMany(\App\Models\Reserva::class, 'cliente_id', 'id');
    }
}
