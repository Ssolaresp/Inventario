<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoEntrada extends Model
{
    use HasFactory;

    protected $table = 'motivos_entrada';  // ← AGREGAR ESTA LÍNEA

    protected $fillable = [
        'nombre',
    ];
}