<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = [
            ['name' => 'Administrador', 'email' => 'admin@example.com', 'rol' => 'Administrador'],
            ['name' => 'Operador', 'email' => 'operador@example.com', 'rol' => 'Operador'],
            ['name' => 'Consultor', 'email' => 'consultor@example.com', 'rol' => 'Consultor'],
        ];

        foreach ($usuarios as $u) {
            $rolId = DB::table('roles')->where('nombre', $u['rol'])->value('id');

            DB::table('users')->insert([
                'name' => $u['name'],
                'email' => $u['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('Umg$2025'),
                'rol_id' => $rolId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
