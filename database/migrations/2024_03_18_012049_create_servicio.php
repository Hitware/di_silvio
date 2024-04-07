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
        Schema::create('servicio', function (Blueprint $table) {
            $table->id();
            $table->string('novedad',80);
            $table->string('descripcion_servicio',1000);
            $table->integer('id_solicitante');
            $table->integer('id_proveedor');
            $table->integer('id_sede');
            $table->string('prioridad',20);
            $table->integer('estado');
            $table->timestamps();

        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio');
    }
};
