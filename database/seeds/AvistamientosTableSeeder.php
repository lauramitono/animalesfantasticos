<?php

use Illuminate\Database\Seeder;
use App\Models\Avistamiento;

class AvistamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //carga de datos
		Avistamiento::create([
			'lugar' => 'Cerca de Arizona',
			'apariencia' => 'Su cabeza es parecida a la de un aguila y sus alas brillan a la luz del sol',
			'estado' => 'perdida',
			'created_at' => '2018-03-05 12:10:00'
		]);
		Avistamiento::create([
			'lugar' => 'Nueva York',
			'apariencia' => 'Era una criatura alada, con dos patas y con un cuerpo serpenteante, parecía una cruza entre un dragón y un pájaro',
			'estado' => 'encontrada',
			'created_at' => '2018-04-18 18:27:58'
		]);
		Avistamiento::create([
			'lugar' => 'Africa',
			'apariencia' => 'Era gigantesco y se parecía a un leopardo y se movía silenciosamente pese a su gran tamaño',
			'estado' => 'perdida',
			'created_at' => '2018-04-20 13:17:30'
		]);
		Avistamiento::create([
			'lugar' => 'República Checa',
			'apariencia' => 'Era grande y con alas',
			'estado' => 'perdida',
			'created_at' => '2018-05-09 12:28:58'
		]);
		Avistamiento::create([
			'lugar' => 'Oceanía',
			'apariencia' => 'Tenía patas de cordero y un hocico de perro. Plumas color verde y negro',
			'estado' => 'encontrada',
			'created_at' => '2018-06-10 09:15:33'
		]);
		Avistamiento::create([
			'lugar' => 'Bar The Blind Pig',
			'apariencia' => 'Un insecto de color azul zafiro, que se movía velozmente. Estaba tomando un trago junto a un gigante',
			'estado' => 'perdida',
			'created_at' => '2018-06-12 03:05:10'
		]);
		Avistamiento::create([
			'lugar' => 'Norte de Gran Bretaña',
			'apariencia' => 'Tenían piel gris pálida y ojos saltones, parecían tímidos pero bailaban a la luz de la luna',
			'estado' => 'perdida',
			'created_at' => '2018-06-16 01:08:15'
		]);
    }
}
