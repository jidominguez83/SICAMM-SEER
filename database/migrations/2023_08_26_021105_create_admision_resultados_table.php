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
        Schema::create('admision_resultados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participacion_procesos_id');
            $table->string('p_fpd', 5);
            $table->string('promedio', 30);
            $table->string('p_prom', 5);
            $table->string('h_cursos', 4);
            $table->string('p_hcursos', 10);
            $table->string('prac_doc', 30)->nullable();
            $table->string('eje_doc', 3);
            $table->string('p_ed', 5);
            $table->string('constancia', 2);
            $table->string('p_aca', 10);

            $table->foreign('participacion_procesos_id')->references('id')->on('participacion_procesos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admision_resultados');
    }
};
