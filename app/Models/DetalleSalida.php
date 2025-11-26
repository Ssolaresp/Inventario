<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSalida extends Model
{
    use HasFactory;

    protected $fillable = [
        'salida_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
        'observaciones'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($detalle) {
            if ($detalle->precio_unitario && $detalle->cantidad) {
                $detalle->subtotal = $detalle->precio_unitario * $detalle->cantidad;
            }
        });
    }

    public function salida()
    {
        return $this->belongsTo(Salida::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}