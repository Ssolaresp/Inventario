<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSalida extends Model
{
    use HasFactory;

    protected $table = 'detalle_salidas';

    protected $fillable = [
        'salida_id',
        'producto_id',
        'cantidad',
        'observaciones',
    ];

    protected $casts = [
        'cantidad' => 'decimal:2',
    ];

    public function salida()
    {
        return $this->belongsTo(Salida::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}