<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntradaSeeder extends Seeder
{
    public function run(): void
    {
        $usuarioId = DB::table('users')->value('id');
        $almacenCentralId = DB::table('almacenes')->where('nombre', 'Bodega Central')->value('id');
        $motivoCompraId = DB::table('motivos_entrada')->where('nombre', 'Compra')->value('id');

        $entradas = [
            ['numero_entrada' => 'ENT-0001', 'fecha_entrada' => now()->subDays(5)],
            ['numero_entrada' => 'ENT-0002', 'fecha_entrada' => now()->subDays(2)],
        ];

        foreach ($entradas as $e) {
            DB::table('entradas')->insert([
                'numero_entrada' => $e['numero_entrada'],
                'almacen_id' => $almacenCentralId,
                'motivo_entrada_id' => $motivoCompraId,
                'fecha_entrada' => $e['fecha_entrada'],
                'observaciones' => 'Entrada generada por seeder',
                'estado' => 'Procesada',
                'usuario_id' => $usuarioId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
