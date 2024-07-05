<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_vendedor');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_cat');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_pago');
            $table->date('fecha_venta');
            $table->decimal('cambio', 8, 2);
            $table->decimal('subtotal', 8, 2);
            $table->decimal('iva', 8, 2);
            $table->decimal('total', 8, 2);
            $table->timestamps();

            $table->foreign('id_vendedor')->references('id_vendedor')->on('vendedores')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('id_cat')->references('id_cat')->on('categorias')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('id_pago')->references('id_pago')->on('formas_pagos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}

