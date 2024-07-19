<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionProductoTable extends Migration
{
    public function up(): void
    {
        Schema::create('cotizacion_producto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cotizacione');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);
            $table->timestamps();

            $table->foreign('id_cotizacione')->references('id')->on('cotizaciones')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cotizacion_producto');
    }
}
