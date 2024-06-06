<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'NIF' => '12345678A',
            'Nombre' => 'Admin',
            'Apellidos' => 'User',
            'FechaNac' => '1980-01-01',
            'Email' => 'admin@example.com',
            'Usuario' => 'adminuser',
            'password' => 'adminpassword', // El mutador se encargará de encriptar la contraseña
        ]);
    }
}
