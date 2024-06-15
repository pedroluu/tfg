<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reserva', function (Blueprint $table) {
            $table->dropForeign(['clase_id']);
        });

        Schema::table('clase', function (Blueprint $table) {
            $table->dropForeign(['entrenador_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reserva', function (Blueprint $table) {
            $table->foreign('clase_id')->references('id')->on('clase');
        });

        Schema::table('clase', function (Blueprint $table) {
            $table->foreign('entrenador_id')->references('id')->on('entrenador');
        });
    }
};
