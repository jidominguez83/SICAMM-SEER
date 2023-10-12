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
        Schema::create('asignados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asignacion_id');          
            $table->string('nombre_titular', 150);
            $table->string('tipo_permiso', 50);
            $table->string('observacion', 255);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('categoria', 10);
            $table->string('funcion', 50);
            $table->string('plaza', 150);
            $table->unsignedBigInteger('participante_id');
            $table->unsignedTinyInteger('valoracion_id');
            $table->string('grado_academico', 100);
            $table->string('estatus', 15);
            $table->string('folio_nombramiento', 10);
            $table->string('codigo_nombramiento', 100);
            $table->string('de_la_del', 100)->nullable();

            $table->foreign('asignacion_id')->references('id')->on('asignaciones');
            $table->foreign('participante_id')->references('id')->on('participantes');
            $table->foreign('valoracion_id')->references('id')->on('valoraciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignados');
    }
};
