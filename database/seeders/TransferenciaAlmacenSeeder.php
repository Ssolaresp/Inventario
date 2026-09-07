<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransferenciaAlmacenSeeder extends Seeder
{
    public function run(): void
    {
        $almacenCentralId = DB::table('almacenes')->where('nombre', 'Bodega Central')->value('id');
        $almacenOccidenteId = DB::table('almacenes')->where('nombre', 'Bodega Occidente')->value('id');
        $productoId = DB::table('productos')->value('id');

        DB::table('transferencia_almacenes')->insert([
            'producto_id' => $productoId,
            'almacen_origen_id' => $almacenCentralId,
            'almacen_destino_id' => $almacenOccidenteId,
            'cantidad' => 15,
            'fecha_transferencia' => now()->subDay(),
            'observaciones' => 'Transferencia generada por seeder',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
