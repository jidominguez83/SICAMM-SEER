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
        Schema::create('cts', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('cct', 20)->unique();
            $table->string('nombre_ct', 150);
            $table->string('nombre_ct_docs', 150)->nullable();
            $table->boolean('matutino');
            $table->boolean('vespertino'); 
            $table->boolean('nocturno');   
            $table->boolean('doble');                                
            $table->string('nivel', 30);
            $table->string('departamento', 50)->nullable();
            $table->string('jefatura', 10);
            $table->string('inspeccion', 100)->nullable();
            $table->string('zona', 4);
            $table->string('sostenimiento', 7)->nullable();
            $table->string('modo', 6)->nullable();
            $table->string('domicilio_registrado', 150)->nullable();
            $table->string('colonia_registrada', 150)->nullable();
            $table->string('cp_registrado', 20)->nullable();
            $table->string('domicilio_fisico', 150)->nullable();
            $table->string('colonia_fisica', 150)->nullable();
            $table->string('cp_fisico', 20)->nullable();
            $table->string('municipio', 75)->nullable();
            $table->string('municipio_min', 75)->nullable();
            $table->string('region', 15);
            $table->string('lada', 10)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('extension', 50)->nullable();
            $table->string('director', 150)->nullable();
            $table->string('domicilio_director', 150)->nullable();
            $table->string('colonia_director', 150)->nullable();
            $table->string('telefono_director', 25)->nullable();
            $table->string('celular_director', 25)->nullable();
            $table->string('municipio_director', 75)->nullable();
            $table->string('jefe_depto', 120)->nullable();
            $table->string('inspector', 120)->nullable();
            $table->string('status', 100)->nullable();
            $table->string('numero_acuerdo', 50)->nullable();
            $table->string('anio_fundacion', 20)->nullable();
            $table->string('correo_electronico', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cts');
    }
};
