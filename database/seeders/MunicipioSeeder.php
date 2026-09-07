<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    public function run(): void
    {
        $municipios = [
            'Guatemala' => ['Guatemala', 'Mixco', 'Villa Nueva'],
            'Quetzaltenango' => ['Quetzaltenango', 'Coatepeque'],
            'Escuintla' => ['Escuintla', 'Puerto San José'],
            'Sacatepéquez' => ['Antigua Guatemala', 'Jocotenango'],
        ];

        foreach ($municipios as $departamento => $nombres) {
            $departamentoId = DB::table('departamentos')->where('nombre', $departamento)->value('id');

            foreach ($nombres as $nombre) {
                DB::table('municipios')->insert([
                    'nombre' => $nombre,
                    'departamento_id' => $departamentoId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
