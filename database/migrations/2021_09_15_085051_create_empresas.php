<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('razon_social', 100);
            $table->string('nombre_comercial', 50);
            $table->string('rfc', 18);
            $table->string('curp', 18);
            $table->string('calle', 150);
            $table->integer('num_int');
            $table->integer('num_ext');
            $table->string('codigo_postal', 10);
            $table->string('colonia', 100);
            $table->string('estado', 100);
            $table->string('ciudad_municipio', 100);
            $table->string('entre_calles', 150);
            $table->string('referencias', 150);
            $table->mediumText('observaciones')->nullable();
            $table->string('nombre_representante', 100)->nullable();
            $table->string('apellidos_representante', 100)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->bigInteger('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
