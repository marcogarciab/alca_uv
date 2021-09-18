<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudPropuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_propuestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->unsignedInteger('norma_id');
            $table->foreign('norma_id')->references('id')->on('normas');
            $table->unsignedInteger('verificacion_tipo_id');
            $table->foreign('verificacion_tipo_id')->references('id')->on('verificacion_tipos');
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
        Schema::dropIfExists('solicitud_propuestas');
    }
}
