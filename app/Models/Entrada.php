<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_entrada',
        'almacen_id',
        'motivo_entrada_id',
        'fecha_entrada',
        'observaciones',
        'estado',
        'usuario_id'
    ];

    protected $casts = [
        'fecha_entrada' => 'date'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($entrada) {
            // Generar número automático ENTR-YYYYMMDD-0001
            if (empty($entrada->numero_entrada)) {
                $entrada->numero_entrada = 'ENTR-' . date('Ymd') . '-' .
                    str_pad(static::whereDate('created_at', today())->count() + 1, 4, '0', STR_PAD_LEFT);
            }

            // Usuario autenticado
            if (empty($entrada->usuario_id)) {
                $entrada->usuario_id = auth()->id();
            }
        });
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    public function motivoEntrada()
    {
        return $this->belongsTo(MotivoEntrada::class, 'motivo_entrada_id');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleEntrada::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
