<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrenadorTable extends Migration
{
    public function up()
    {
        Schema::create('entrenador', function (Blueprint $table) {
            $table->id();
            $table->string('NIF', 50);
            $table->string('Nombre', 255);
            $table->string('Apellidos', 255);
            $table->date('FechaNac');
            $table->decimal('Sueldo', 10, 2);
            $table->foreignId('gimnasio_id')->constrained('gimnasio');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entrenador');
    }
}
