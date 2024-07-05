<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendedorsTable extends Migration
{
    public function up()
    {
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id('id_vendedor');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('telefono');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendedores');
    }
}
