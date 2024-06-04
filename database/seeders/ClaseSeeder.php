<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ClaseSeeder extends Seeder
{
    public function run()
    {
        $horarios = [
            'Lunes' => [
                '09:30-11:00' => 'Funcional',
                '11:30-13:00' => 'Open Box',
                '13:00-14:00' => 'Cross Training',
                '16:00-18:00' => 'Halterofilia',
                '18:30-20:00' => 'Open Box'
            ],
            'Martes' => [
                '09:30-11:00' => 'Open Box',
                '11:30-13:00' => 'Funcional',
                '13:00-14:00' => 'Cross Training',
                '16:00-18:00' => 'Halterofilia',
                '18:30-20:00' => 'Open Box'
            ],
            'Miércoles' => [
                '09:30-11:00' => 'Open Box',
                '11:30-13:00' => 'Cross Training',
                '13:00-14:00' => 'Funcional',
                '16:00-18:00' => 'Open Box',
                '18:30-20:00' => 'Cross Training'
            ],
            'Jueves' => [
                '09:30-11:00' => 'Open Box',
                '11:30-13:00' => 'Open Box',
                '13:00-14:00' => 'Funcional',
                '16:00-18:00' => 'Halterofilia',
                '18:30-20:00' => 'Funcional'
            ],
            'Viernes' => [
                '09:30-11:00' => 'Open Box',
                '11:30-13:00' => 'Cross Training',
                '13:00-14:00' => 'Funcional',
                '16:00-18:00' => 'Cross Training',
                '18:30-20:00' => 'Open Box'
            ],
            'Sábado' => [
                '09:30-11:00' => 'Open Box',
                '11:30-13:00' => 'Funcional',
                '13:00-14:00' => 'Cross Training',
                '16:00-18:00' => 'Halterofilia',
                '18:30-20:00' => 'Open Box'
            ]
        ];

        $clases = [];
        foreach ($horarios as $dia => $horas) {
            foreach ($horas as $hora => $nombre_clase) {
                $clases[] = [
                    'dia' => $dia,
                    'hora' => $hora,
                    'Nombre' => $nombre_clase,
                    'ejercicios' => 'Ejercicios varios',
                    'capacidad' => 20,
                    'entrenador_id' => 1, // Asignar un entrenador_id válido según tu base de datos
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }
        }

        DB::table('clase')->insert($clases);
    }
}
