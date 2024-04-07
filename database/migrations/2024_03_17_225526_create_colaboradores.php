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
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion',40);
            $table->string('nombres',40);
            $table->string('apellidos',80);
            $table->string('telefono',20);
            $table->string('direccion',20);
            $table->string('rut',245);
            $table->string('referencia_bancaria',245);
            $table->string('estado',1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradores');
    }
};
