<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleSalidaSeeder extends Seeder
{
    public function run(): void
    {
        $salidas = DB::table('salidas')->pluck('id');
        $productos = DB::table('productos')->pluck('id');

        foreach ($salidas as $salidaId) {
            foreach ($productos->take(2) as $productoId) {
                DB::table('detalle_salidas')->insert([
                    'salida_id' => $salidaId,
                    'producto_id' => $productoId,
                    'cantidad' => 5,
                    'observaciones' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
