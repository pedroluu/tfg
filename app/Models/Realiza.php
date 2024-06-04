<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realiza extends Model
{
    use HasFactory;

    protected $table = 'realiza';

    protected $fillable = [
        'cliente_id',
        'clase_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function clase()
    {
        return $this->belongsTo(Clase::class);
    }
}
