<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadMedidaSeeder extends Seeder
{
    public function run(): void
    {
        $unidades = [
            ['nombre' => 'Unidad', 'abreviatura' => 'UND'],
            ['nombre' => 'Caja', 'abreviatura' => 'CJA'],
            ['nombre' => 'Libra', 'abreviatura' => 'LB'],
            ['nombre' => 'Kilogramo', 'abreviatura' => 'KG'],
            ['nombre' => 'Litro', 'abreviatura' => 'LT'],
            ['nombre' => 'Galón', 'abreviatura' => 'GAL'],
        ];

        foreach ($unidades as $unidad) {
            DB::table('unidad_medidas')->insert([
                'nombre' => $unidad['nombre'],
                'abreviatura' => $unidad['abreviatura'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
