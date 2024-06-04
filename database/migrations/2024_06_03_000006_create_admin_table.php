<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('NIF', 50);
            $table->string('Nombre', 255);
            $table->string('Apellidos', 255);
            $table->date('FechaNac');
            $table->string('Email', 255)->unique();
            $table->string('Usuario', 50)->unique();
            $table->string('password'); // Usar 'password' en lugar de 'Contraseña' para seguir las convenciones de Laravel
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
