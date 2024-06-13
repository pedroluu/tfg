<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
                // GimnasioSeeder::class,
                // AdminSeeder::class,
                // EntrenadorSeeder::class,
                // ClientSeeder::class,
            ClaseSeeder::class,

        ]);
    }
}
