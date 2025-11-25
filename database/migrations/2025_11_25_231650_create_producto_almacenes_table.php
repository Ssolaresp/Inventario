<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('producto_almacenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('almacen_id')->constrained('almacenes')->onDelete('cascade');
            $table->integer('stock_inicial')->default(0);
            $table->integer('stock_minimo')->default(0);
            $table->integer('stock_maximo')->default(0);
            $table->date('fecha_vencimiento')->nullable();
            $table->timestamps();
            
            // Evitar duplicados: un producto solo puede estar una vez en un almacén
            $table->unique(['producto_id', 'almacen_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('producto_almacenes');
    }
};