<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        $estadoActivoId = DB::table('estados')->where('nombre', 'Activo')->value('id');

        $clientes = [
            [
                'nombre' => 'Supermercado La Económica',
                'nit' => '4567890-1',
                'telefono' => '22110022',
                'correo' => 'compras@laeconomica.com.gt',
                'direccion' => '6a Avenida 12-40 Zona 4',
                'municipio' => 'Guatemala',
                'departamento' => 'Guatemala',
            ],
            [
                'nombre' => 'Ferretería Don Pedro',
                'nit' => '5678901-2',
                'telefono' => '44556677',
                'correo' => 'donpedro@ferreteria.com.gt',
                'direccion' => '1a Calle 5-10 Zona 1',
                'municipio' => 'Villa Nueva',
                'departamento' => 'Guatemala',
            ],
            [
                'nombre' => 'Restaurante El Buen Sabor',
                'nit' => '6789012-3',
                'telefono' => '33221100',
                'correo' => 'pedidos@buensabor.com.gt',
                'direccion' => '4a Avenida 8-25 Zona 2',
                'municipio' => 'Antigua Guatemala',
                'departamento' => 'Sacatepéquez',
            ],
        ];

        foreach ($clientes as $c) {
            $municipioId = DB::table('municipios')->where('nombre', $c['municipio'])->value('id');
            $departamentoId = DB::table('departamentos')->where('nombre', $c['departamento'])->value('id');

            DB::table('clientes')->insert([
                'nombre' => $c['nombre'],
                'nit' => $c['nit'],
                'telefono' => $c['telefono'],
                'correo' => $c['correo'],
                'direccion' => $c['direccion'],
                'municipio_id' => $municipioId,
                'departamento_id' => $departamentoId,
                'estado_id' => $estadoActivoId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
