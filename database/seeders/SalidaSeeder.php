<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalidaSeeder extends Seeder
{
    public function run(): void
    {
        $usuarioId = DB::table('users')->value('id');
        $almacenCentralId = DB::table('almacenes')->where('nombre', 'Bodega Central')->value('id');
        $motivoVentaId = DB::table('motivos_salida')->where('nombre', 'Venta')->value('id');

        $salidas = [
            ['numero_salida' => 'SAL-0001', 'fecha_salida' => now()->subDays(4)],
            ['numero_salida' => 'SAL-0002', 'fecha_salida' => now()->subDay()],
        ];

        foreach ($salidas as $s) {
            DB::table('salidas')->insert([
                'numero_salida' => $s['numero_salida'],
                'almacen_id' => $almacenCentralId,
                'motivo_salida_id' => $motivoVentaId,
                'fecha_salida' => $s['fecha_salida'],
                'observaciones' => 'Salida generada por seeder',
                'estado' => 'Procesada',
                'usuario_id' => $usuarioId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
