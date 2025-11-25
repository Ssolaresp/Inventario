<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('almacenes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('encargado')->nullable();
            $table->foreignId('municipio_id')->constrained('municipios')->onDelete('cascade');
            $table->foreignId('departamento_id')->constrained('departamentos')->onDelete('cascade');
            $table->foreignId('estado_id')->constrained('estados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('almacenes');
    }
};