<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path');
            $table->unsignedInteger('evidencia_tipo_id');
            $table->foreign('evidencia_tipo_id')->references('id')->on('evidencia_tipos');
            $table->bigInteger('acta_id')->unsigned();
            $table->foreign('acta_id')->references('id')->on('actas');
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
        Schema::dropIfExists('evidencias');
    }
}
