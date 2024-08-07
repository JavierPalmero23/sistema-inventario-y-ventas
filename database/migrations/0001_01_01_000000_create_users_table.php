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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->id('id_cat');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre');
            $table->foreignId('id_cat')->constrained('categorias', 'id_cat');
            $table->date('fecha_compra');
            $table->string('colore');
            $table->string('existencia');
            $table->string('descripcion_corta');
            $table->text('descripcion_larga');
            $table->timestamps();
        });

        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('nombre');
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('rfc')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('regimen_fiscal')->nullable();
            $table->timestamps();
        });

        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('id_proveedor');
            $table->string('nombre');
            $table->string('nombre_contacto')->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->timestamps();
        });

        Schema::create('formas_pagos', function (Blueprint $table) {
            $table->id('id_pago');
            $table->string('tipo');
            $table->timestamps();
        });

        Schema::create('vendedores', function (Blueprint $table) {
            $table->id('id_vendedor');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('telefono');
            $table->timestamps();
        });

        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proveedor');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->date('fecha_compra');
            $table->decimal('descuento', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedores')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
        });

        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->date('fecha_cot');
            $table->decimal('total', 15, 2);
            $table->date('vigencia');
            $table->text('comentarios')->nullable();
            $table->timestamps();

            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
        });

        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->date('fecha_venta');
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
        });

        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_cat');
            $table->date('fecha_entrada');
            $table->date('fecha_salida')->nullable();
            $table->integer('movimiento');
            $table->text('motivo')->nullable();
            $table->integer('cantidad');
            $table->timestamps();
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('id_cat')->references('id_cat')->on('categorias')->onDelete('cascade');
        });

        Schema::create('detalles_cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cotizacion');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio', 15, 2);
            $table->timestamps();

            $table->foreign('id_cotizacion')->references('id')->on('cotizaciones')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
        });

        Schema::create('venta_producto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);
            $table->timestamps();

            $table->foreign('id_venta')->references('id')->on('ventas')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
        });

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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacion_producto');
        Schema::dropIfExists('venta_producto');
        Schema::dropIfExists('detalles_cotizaciones');
        Schema::dropIfExists('inventarios');
        Schema::dropIfExists('ventas');
        Schema::dropIfExists('cotizaciones');
        Schema::dropIfExists('compras');
        Schema::dropIfExists('vendedores');
        Schema::dropIfExists('formas_pagos');
        Schema::dropIfExists('proveedores');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('productos');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
