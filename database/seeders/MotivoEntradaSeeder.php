<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivoEntradaSeeder extends Seeder
{
    public function run(): void
    {
        $motivos = ['Compra', 'Devolución', 'Ajuste de Inventario'];

        foreach ($motivos as $nombre) {
            DB::table('motivos_entrada')->insert([
                'nombre' => $nombre,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
