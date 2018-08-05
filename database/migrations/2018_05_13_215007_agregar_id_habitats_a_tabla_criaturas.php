<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarIdHabitatsATablaCriaturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('criaturas', function(Blueprint $table){
			$table -> unsignedInteger('id_habitat')->nullable();
			$table -> foreign('id_habitat')->references('id_habitat')->on('habitats');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
