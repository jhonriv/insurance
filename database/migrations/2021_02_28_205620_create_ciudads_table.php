<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_estado')->unsigned();
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->bigInteger('id_pais')->unsigned();
            $table->foreign('id_pais')->references('id')->on('pais');
            $table->string('nombre', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciudads');
    }
}
