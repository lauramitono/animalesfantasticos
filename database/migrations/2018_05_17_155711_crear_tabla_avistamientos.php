<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAvistamientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creo la tabla
        Schema::create('avistamientos', function(Blueprint $table){
			$table->increments('id_avistamiento');
			$table->string('lugar', 100);
			$table->text('apariencia');
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
        Schema::dropIfExists('avistamientos');
    }
}
