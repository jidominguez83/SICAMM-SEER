<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('participacion_procesos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participante_id');
            $table->tinyInteger('ciclo_id')->unsigned();
            $table->string('folio_federal', 20)->nullable();
            $table->unsignedTinyInteger('valoracion_id');
            $table->string('p_global', 30)->nullable();
            $table->smallInteger('posicion')->nullable()->unsigned();
            $table->tinyInteger('estatus')->unsigned();
            $table->string('motivo_baja', 150)->nullable();

            $table->foreign('participante_id')->references('id')->on('participantes');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->foreign('valoracion_id')->references('id')->on('valoraciones');
            $table->foreign('estatus')->references('id')->on('estatuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participacion_procesos');
    }
};
