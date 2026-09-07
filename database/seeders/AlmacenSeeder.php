<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlmacenSeeder extends Seeder
{
    public function run(): void
    {
        $estadoActivoId = DB::table('estados')->where('nombre', 'Activo')->value('id');

        $almacenes = [
            [
                'nombre' => 'Bodega Central',
                'direccion' => 'Km 5 Carretera al Atlántico, Zona 17',
                'telefono' => '22990011',
                'encargado' => 'Carlos Ramírez',
                'municipio' => 'Guatemala',
                'departamento' => 'Guatemala',
            ],
            [
                'nombre' => 'Bodega Occidente',
                'direccion' => '7a Calle 3-20 Zona 3, Quetzaltenango',
                'telefono' => '77332211',
                'encargado' => 'María López',
                'municipio' => 'Quetzaltenango',
                'departamento' => 'Quetzaltenango',
            ],
        ];

        foreach ($almacenes as $a) {
            $municipioId = DB::table('municipios')->where('nombre', $a['municipio'])->value('id');
            $departamentoId = DB::table('departamentos')->where('nombre', $a['departamento'])->value('id');

            DB::table('almacenes')->insert([
                'nombre' => $a['nombre'],
                'direccion' => $a['direccion'],
                'telefono' => $a['telefono'],
                'encargado' => $a['encargado'],
                'municipio_id' => $municipioId,
                'departamento_id' => $departamentoId,
                'estado_id' => $estadoActivoId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
