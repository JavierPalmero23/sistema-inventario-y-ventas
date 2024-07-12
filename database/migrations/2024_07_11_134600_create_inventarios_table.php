<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_cat');
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->integer('movimiento');
            $table->text('motivo')->nullable();
            $table->integer('cantidad');
            $table->timestamps();

            // Agregar claves foráneas si es necesario
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('id_cat')->references('id_cat')->on('categorias')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
}
