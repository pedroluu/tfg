<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirigeTable extends Migration
{
    public function up()
    {
        Schema::create('dirige', function (Blueprint $table) {
            $table->foreignId('gimnasio_id')->constrained('gimnasio');
            $table->foreignId('admin_id')->constrained('admin');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dirige');
    }
}
