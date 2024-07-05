<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormasPagoTable extends Migration
{
    public function up()
    {
        Schema::create('formas_pagos', function (Blueprint $table) {
            $table->id('id_pago');
            $table->string('tipo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formas_pagos');
    }
}

