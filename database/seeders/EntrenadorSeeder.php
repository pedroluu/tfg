<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entrenador;

class EntrenadorSeeder extends Seeder
{
    public function run()
    {
        Entrenador::create([
            'NIF' => '12345678A',
            'Nombre' => 'John',
            'Apellidos' => 'Doe',
            'FechaNac' => '1980-01-01',
            'Sueldo' => 2000.00,
            'gimnasio_id' => 1, // Asumiendo que el gimnasio con ID 1 existe
        ]);

        Entrenador::create([
            'NIF' => '87654321B',
            'Nombre' => 'Jane',
            'Apellidos' => 'Smith',
            'FechaNac' => '1985-02-15',
            'Sueldo' => 2200.00,
            'gimnasio_id' => 2, // Asumiendo que el gimnasio con ID 2 existe
        ]);
    }
}
