<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propuestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_control', 30);
            $table->bigInteger('costo');
            $table->boolean('es_aceptada', 1)->nullable();
            $table->date('fecha_aceptacion')->nullable();
            $table->bigInteger('solicitud_propuesta_id')->unsigned();
            $table->foreign('solicitud_propuesta_id')->references('id')->on('solicitud_propuestas');
            $table->integer('verificadore_id')->unsigned();
            $table->foreign('verificadore_id')->references('id')->on('verificadores');
            $table->string('path');
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
        Schema::dropIfExists('propuestas');
    }
}
