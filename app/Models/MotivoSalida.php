<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoSalida extends Model
{
    use HasFactory;

    protected $table = 'motivos_salida';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function salidas()
    {
        return $this->hasMany(Salida::class);
    }
}