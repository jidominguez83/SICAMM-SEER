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
        Schema::create('plazas_asignadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('asignados_id');
            $table->string('clave_presupuestal', 75);
            $table->unsignedTinyInteger('ct_id');
            $table->char('turno');

            $table->foreign('ct_id')->references('id')->on('cts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plazas_asignadas');
    }
};
