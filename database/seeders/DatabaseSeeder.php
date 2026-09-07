<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DepartamentoSeeder::class,
            EstadoSeeder::class,
            MunicipioSeeder::class,
            CategoriaSeeder::class,
            UnidadMedidaSeeder::class,
            ProveedorSeeder::class,
            ClienteSeeder::class,
            AlmacenSeeder::class,
            ProductoSeeder::class,
            ProductoAlmacenSeeder::class,
            MotivoEntradaSeeder::class,
            MotivoSalidaSeeder::class,
            EntradaSeeder::class,
            DetalleEntradaSeeder::class,
            SalidaSeeder::class,
            DetalleSalidaSeeder::class,
            TransferenciaAlmacenSeeder::class,
        ]);
    }
}
