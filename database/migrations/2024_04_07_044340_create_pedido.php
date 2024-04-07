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
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->string('naturaleza',1000)->nullable();
            $table->integer('id_solicitante')->nullable();
            $table->integer('id_proveedor')->nullable();
            $table->integer('id_sede')->nullable();
            $table->string('orden_compra',100)->nullable();
            $table->string('factura',100)->nullable();
            $table->string('valor_factura',10);
            $table->string('estado',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
