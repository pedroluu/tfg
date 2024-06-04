<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealizaTable extends Migration
{
    public function up()
    {
        Schema::create('realiza', function (Blueprint $table) {
            $table->foreignId('cliente_id')->constrained('cliente');
            $table->foreignId('clase_id')->constrained('clase');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('realiza');
    }
}
