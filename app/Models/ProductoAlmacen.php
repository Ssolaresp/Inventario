<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductoAlmacen extends Model
{
    protected $table = 'producto_almacenes';
    
    protected $fillable = [
        'producto_id',
        'almacen_id',
        'stock_inicial',
        'stock_minimo',
        'stock_maximo',
        'fecha_vencimiento',
    ];

    protected $casts = [
        'fecha_vencimiento' => 'date',
    ];

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    public function almacen(): BelongsTo
    {
        return $this->belongsTo(Almacen::class);
    }
}