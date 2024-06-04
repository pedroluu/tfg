<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gimnasio extends Model
{
    use HasFactory;

    protected $table = 'gimnasio';

    protected $fillable = [
        'Nombre',
        'Direccion',
        'Ciudad',
        'Pais'
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function entrenadores()
    {
        return $this->hasMany(Entrenador::class);
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'dirige');
    }
}
