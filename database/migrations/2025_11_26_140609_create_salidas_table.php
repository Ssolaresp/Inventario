<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            $table->string('numero_salida')->unique();
            $table->foreignId('almacen_id')->constrained('almacenes')->onDelete('cascade');
            $table->foreignId('motivo_salida_id')->constrained('motivos_salida')->onDelete('restrict');
            $table->date('fecha_salida');
            $table->text('observaciones')->nullable();
            $table->enum('estado', ['pendiente', 'completada', 'anulada'])->default('pendiente');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salidas');
    }
};