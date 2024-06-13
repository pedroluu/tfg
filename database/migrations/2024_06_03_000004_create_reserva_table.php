<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaTable extends Migration
{
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('cliente');
            $table->foreignId('clase_id')->constrained('clase');
            $table->date('FechaReserva');
            $table->timestamps();

            // Agregar índice único
            $table->unique(['cliente_id', 'clase_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('reserva');
    }
}

