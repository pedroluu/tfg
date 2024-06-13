<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gimnasio;

class GimnasioSeeder extends Seeder
{
    public function run()
    {
        Gimnasio::create([
            'Nombre' => 'Hades Box Center',
            'Direccion' => 'Calle Ejemplo 123',
            'Ciudad' => 'Madrid',
            'Pais' => 'España',
        ]);

        Gimnasio::create([
            'Nombre' => 'Zeus Gym',
            'Direccion' => 'Avenida Principal 456',
            'Ciudad' => 'Barcelona',
            'Pais' => 'España',
        ]);
    }
}
