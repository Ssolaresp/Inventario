<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Define los campos que se pueden llenar desde Filament
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
