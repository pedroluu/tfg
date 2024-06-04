<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dirige extends Model
{
    use HasFactory;

    protected $table = 'dirige';

    protected $fillable = [
        'gimnasio_id',
        'admin_id'
    ];

    public function gimnasio()
    {
        return $this->belongsTo(Gimnasio::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
