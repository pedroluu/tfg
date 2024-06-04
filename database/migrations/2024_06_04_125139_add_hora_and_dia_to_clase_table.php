<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('clase', function (Blueprint $table) {
            $table->string('hora');
            $table->string('dia');
        });
    }

    public function down()
    {
        Schema::table('clase', function (Blueprint $table) {
            $table->dropColumn(['hora', 'dia']);
        });
    }

};
