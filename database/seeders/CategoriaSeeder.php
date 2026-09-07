<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Laptops y Computadoras', 'descripcion' => 'Equipos de cómputo de escritorio y portátiles'],
            ['nombre' => 'Componentes de PC', 'descripcion' => 'Procesadores, tarjetas madre, memorias RAM, discos'],
            ['nombre' => 'Periféricos', 'descripcion' => 'Teclados, mouse, monitores, audífonos'],
            ['nombre' => 'Redes', 'descripcion' => 'Routers, switches, cables de red, access points'],
            ['nombre' => 'Software y Licencias', 'descripcion' => 'Sistemas operativos, antivirus, licencias de software'],
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert([
                'nombre' => $categoria['nombre'],
                'descripcion' => $categoria['descripcion'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}