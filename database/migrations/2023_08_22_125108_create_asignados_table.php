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
            $table->bigInteger('upload_id')->unsigned();
            $table->string('clave_presupuestal', 75);
            $table->string('nombre_titular', 150);
            $table->string('tipo_permiso', 50);
            $table->string('observacion', 255);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unsignedTinyInteger('ct_id');
            $table->char('turno');
            $table->string('categoria', 10);
            $table->string('funcion', 50);
            $table->string('plaza', 150);
            $table->unsignedBigInteger('participante_id');
            $table->string('materia', 255)->nullable();
            $table->string('grado_academico', 100);
            $table->string('estatus', 15);
            $table->string('folio_nombramiento', 10);
            $table->string('clave_presupuestal2', 50)->nullable();
            $table->string('clave_presupuestal3', 50)->nullable();
            $table->string('clave_presupuestal4', 50)->nullable();
            $table->string('clave_presupuestal5', 50)->nullable();
            $table->string('codigo_nombramiento', 100);
            $table->string('de_la_del', 100)->nullable();
            $table->unsignedTinyInteger('ct_id_1')->nullable();
            $table->unsignedTinyInteger('ct_id_2')->nullable();
            $table->unsignedTinyInteger('ct_id_3')->nullable();
            $table->unsignedTinyInteger('ct_id_4')->nullable();                        

            $table->foreign('upload_id')->references('id')->on('uploads');
            $table->foreign('participante_id')->references('id')->on('participantes');
            $table->foreign('ct_id')->references('id')->on('cts');
            $table->foreign('ct_id_1')->references('id')->on('cts');
            $table->foreign('ct_id_2')->references('id')->on('cts');
            $table->foreign('ct_id_3')->references('id')->on('cts');
            $table->foreign('ct_id_4')->references('id')->on('cts');
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
