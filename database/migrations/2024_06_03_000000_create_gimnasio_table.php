<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGimnasioTable extends Migration
{
    public function up()
    {
        Schema::create('gimnasio', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre', 255);
            $table->string('Direccion', 255);
            $table->string('Ciudad', 100);
            $table->string('Pais', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gimnasio');
    }
}
