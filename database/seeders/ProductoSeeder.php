<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Laptop HP 15 pulgadas', 'categoria' => 'Laptops y Computadoras', 'unidad' => 'Unidad', 'proveedor' => 'Distribuidora El Sol, S.A.'],
            ['nombre' => 'Memoria RAM DDR4 8GB', 'categoria' => 'Componentes de PC', 'unidad' => 'Unidad', 'proveedor' => 'Comercial Occidente, S.A.'],
            ['nombre' => 'Disco Sólido SSD 480GB', 'categoria' => 'Componentes de PC', 'unidad' => 'Unidad', 'proveedor' => 'Suministros Costa Sur, S.A.'],
            ['nombre' => 'Teclado y Mouse Inalámbrico', 'categoria' => 'Periféricos', 'unidad' => 'Caja', 'proveedor' => 'Distribuidora El Sol, S.A.'],
            ['nombre' => 'Router WiFi AC1200', 'categoria' => 'Redes', 'unidad' => 'Unidad', 'proveedor' => 'Comercial Occidente, S.A.'],
        ];

        foreach ($productos as $p) {
            $categoriaId = DB::table('categorias')->where('nombre', $p['categoria'])->value('id');
            $unidadMedidaId = DB::table('unidad_medidas')->where('nombre', $p['unidad'])->value('id');
            $proveedorId = DB::table('proveedores')->where('nombre', $p['proveedor'])->value('id');

            DB::table('productos')->insert([
                'nombre' => $p['nombre'],
                'categoria_id' => $categoriaId,
                'unidad_medida_id' => $unidadMedidaId,
                'proveedor_id' => $proveedorId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}