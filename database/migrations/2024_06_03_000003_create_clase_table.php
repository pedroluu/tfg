<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaseTable extends Migration
{
    public function up()
    {
        Schema::create('clase', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre', 255);
            $table->text('ejercicios');
            $table->integer('capacidad');
            $table->foreignId('entrenador_id')->constrained('entrenador');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clase');
    }
}
