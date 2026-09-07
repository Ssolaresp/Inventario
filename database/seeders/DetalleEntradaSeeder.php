<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleEntradaSeeder extends Seeder
{
    public function run(): void
    {
        $entradas = DB::table('entradas')->pluck('id');
        $productos = DB::table('productos')->pluck('id');

        foreach ($entradas as $entradaId) {
            foreach ($productos->take(3) as $productoId) {
                DB::table('detalle_entradas')->insert([
                    'entrada_id' => $entradaId,
                    'producto_id' => $productoId,
                    'cantidad' => 20,
                    'observaciones' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
