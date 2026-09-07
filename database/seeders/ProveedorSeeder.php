<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    public function run(): void
    {
        $estadoActivoId = DB::table('estados')->where('nombre', 'Activo')->value('id');

        $proveedores = [
            [
                'nombre' => 'Distribuidora El Sol, S.A.',
                'nit' => '1234567-8',
                'telefono' => '22334455',
                'correo' => 'ventas@elsol.com.gt',
                'direccion' => '5a Avenida 10-20 Zona 1',
                'municipio' => 'Guatemala',
                'departamento' => 'Guatemala',
            ],
            [
                'nombre' => 'Comercial Occidente, S.A.',
                'nit' => '2345678-9',
                'telefono' => '77889900',
                'correo' => 'contacto@occidente.com.gt',
                'direccion' => '3a Calle 4-15 Zona 3',
                'municipio' => 'Quetzaltenango',
                'departamento' => 'Quetzaltenango',
            ],
            [
                'nombre' => 'Suministros Costa Sur, S.A.',
                'nit' => '3456789-0',
                'telefono' => '55667788',
                'correo' => 'info@costasur.com.gt',
                'direccion' => '2a Avenida 6-30 Zona 2',
                'municipio' => 'Escuintla',
                'departamento' => 'Escuintla',
            ],
        ];

        foreach ($proveedores as $p) {
            $municipioId = DB::table('municipios')->where('nombre', $p['municipio'])->value('id');
            $departamentoId = DB::table('departamentos')->where('nombre', $p['departamento'])->value('id');

            DB::table('proveedores')->insert([
                'nombre' => $p['nombre'],
                'nit' => $p['nit'],
                'telefono' => $p['telefono'],
                'correo' => $p['correo'],
                'direccion' => $p['direccion'],
                'municipio_id' => $municipioId,
                'departamento_id' => $departamentoId,
                'estado_id' => $estadoActivoId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
