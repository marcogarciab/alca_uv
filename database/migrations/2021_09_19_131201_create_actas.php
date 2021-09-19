<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('alcance_verificacion');
            $table->text('hechos_verificacion');
            $table->boolean('es_modifica_alcance');
            $table->boolean('es_no_conformidad'); 
            $table->text('descripcion_no_conformidad')->nullable();
            $table->text('descripcion_accion_correctiva')->nullable();
            $table->text('observaciones_protesta')->nullable();
            $table->text('observaciones_representante')->nullable();
            $table->dateTime('fecha_fin');
            $table->string('path');
            $table->bigInteger('ordene_id')->unsigned();
            $table->foreign('ordene_id')->references('id')->on('ordenes');
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
        Schema::dropIfExists('actas');
    }
}
