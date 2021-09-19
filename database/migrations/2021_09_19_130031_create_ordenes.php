<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_servicio', 30);
            $table->date('fecha_verificacion');
            $table->bigInteger('propuesta_id')->unsigned();
            $table->foreign('propuesta_id')->references('id')->on('propuestas');
            $table->integer('verificadore_id')->unsigned();
            $table->string('path');
            $table->foreign('verificadore_id')->references('id')->on('verificadores');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes');
    }
}
