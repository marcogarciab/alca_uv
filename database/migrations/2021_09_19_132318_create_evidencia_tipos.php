<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidenciaTipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencia_tipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->unsignedInteger('norma_id');
            $table->foreign('norma_id')->references('id')->on('normas');
            $table->unsignedInteger('verificacion_tipo_id');
            $table->foreign('verificacion_tipo_id')->references('id')->on('verificacion_tipos');
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
        Schema::dropIfExists('evidencia_tipos');
    }
}
