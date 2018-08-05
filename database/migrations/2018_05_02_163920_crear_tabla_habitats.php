<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaHabitats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creo la tabla
        Schema::create('habitats', function(Blueprint $table){
			$table->increments('id_habitat');
			//$table->text('tipo');
			$table->string('tipo', 100);
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
        //elimino la tabla
        Schema::dropIfExists('habitats');
    }
}
