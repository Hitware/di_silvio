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
        Schema::create('solicitud_pago', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion_servicio',1000)->nullable();
            $table->string('archivo_solicitud_pago',100)->nullable();
            $table->string('archivo_evidencias',100)->nullable();
            $table->integer('estado_pago')->nullable();
            $table->integer('id_servicio')->nullable();
            $table->integer('id_proveedor')->nullable();
            $table->integer('id_sede')->nullable();
            $table->string('valor_pago',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_pago');
    }
};
