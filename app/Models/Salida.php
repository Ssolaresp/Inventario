<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_salida',
        'almacen_id',
        'motivo_salida_id',
        'fecha_salida',
        'observaciones',
        'estado',
        'usuario_id'
    ];

    protected $casts = [
        'fecha_salida' => 'date'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($salida) {
            if (empty($salida->numero_salida)) {
                $salida->numero_salida = 'SAL-' . date('Ymd') . '-' . str_pad(static::whereDate('created_at', today())->count() + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    public function motivoSalida()
    {
        return $this->belongsTo(MotivoSalida::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetalleSalida::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}