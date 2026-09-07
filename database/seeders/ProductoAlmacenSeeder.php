<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoAlmacenSeeder extends Seeder
{
    public function run(): void
    {
        $almacenCentralId = DB::table('almacenes')->where('nombre', 'Bodega Central')->value('id');
        $almacenOccidenteId = DB::table('almacenes')->where('nombre', 'Bodega Occidente')->value('id');

        $productos = DB::table('productos')->pluck('id');

        foreach ($productos as $productoId) {
            DB::table('producto_almacenes')->insert([
                'producto_id' => $productoId,
                'almacen_id' => $almacenCentralId,
                'stock_inicial' => 100,
                'stock_minimo' => 10,
                'stock_maximo' => 200,
                'fecha_vencimiento' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Solo los dos primeros productos también en Bodega Occidente
        foreach ($productos->take(2) as $productoId) {
            DB::table('producto_almacenes')->insert([
                'producto_id' => $productoId,
                'almacen_id' => $almacenOccidenteId,
                'stock_inicial' => 50,
                'stock_minimo' => 5,
                'stock_maximo' => 100,
                'fecha_vencimiento' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
