<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictamenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictamenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('es_aprobado', 1)->nullable();
            $table->string('path');
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
        Schema::dropIfExists('dictamenes');
    }
}
