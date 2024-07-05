<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre');
            $table->foreignId('id_cat')->constrained('categorias', 'id_cat');
            $table->decimal('pv', 8, 2); // precio de venta
            $table->decimal('pc', 8, 2); // precio de compra
            $table->date('fecha_compra');
            $table->string('colore');
            $table->string('descripcion_corta');
            $table->text('descripcion_larga');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}

