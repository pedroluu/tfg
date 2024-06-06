<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClientSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'Nombre' => 'Client',
            'Apellidos' => 'User',
            'FechaNac' => '1990-01-01',
            'Cuota' => '30',
            'Email' => 'client@example.com',
            'Usuario' => 'clientuser',
            'password' => 'clientpassword', // El mutador se encargará de encriptar la contraseña
            'gimnasio_id' => 1
        ]);
    }
}
