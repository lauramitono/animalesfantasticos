<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCriaturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		//creo la tabla
        Schema::create('criaturas', function(Blueprint $table){
			$table->increments('id_criatura');
			$table->string('nombre_criatura', 100);
			$table->text('apariencia');
			$table->text('habilidades_magicas')->nullable();
			$table->text('peligros')->nullable();
			$table->string('imagen')->nullable();
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
        Schema::dropIfExists('criaturas');
    }
}
