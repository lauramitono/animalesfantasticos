<?php

use Illuminate\Database\Seeder;
use App\Models\Comentario;

class ComentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //carga de datos
		Comentario::create([
			'comentario' => 'Linda Criaturita',
			'id_criatura'=> 1,
			'id_user'=> 5,
			'created_at' => '2018-06-16 18:27:58'	
		]);
		Comentario::create([
			'comentario' => 'Genial que lo encontraron, se ha robado todas mis monedas!',
			'id_criatura'=> 2,
			'id_user'=> 6,
			'created_at' => '2018-06-17 18:27:58'		
		]);
		Comentario::create([
			'comentario' => 'Son criaturas adorables',
			'id_criatura'=> 3,
			'id_user'=> 7,
			'created_at' => '2018-06-18 18:27:58'	
		]);
		Comentario::create([
			'comentario' => 'Los felicitito!',
			'id_criatura'=> 1,
			'id_user'=> 8,
			'created_at' => '2018-06-19 18:27:58'	
		]);
		Comentario::create([
			'comentario' => 'Creo que tengo una pócima para el mal aliento de esa criatura aterradora',
			'id_criatura'=> 4,
			'id_user'=> 7,
			'created_at' => '2018-06-20 18:27:58'	
		]);
		Comentario::create([
			'comentario' => 'Esta parece bastante peligrosa',
			'id_criatura'=> 5,
			'id_user'=> 5,
			'created_at' => '2018-06-21 18:27:58'	
		]);
    }
}
