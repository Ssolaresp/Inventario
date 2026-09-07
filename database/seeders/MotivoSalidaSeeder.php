<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivoSalidaSeeder extends Seeder
{
    public function run(): void
    {
        $motivos = ['Venta', 'Merma', 'Ajuste de Inventario', 'Traslado'];

        foreach ($motivos as $nombre) {
            DB::table('motivos_salida')->insert([
                'nombre' => $nombre,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
