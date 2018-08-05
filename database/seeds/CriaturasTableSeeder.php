<?php

use Illuminate\Database\Seeder;
use App\Models\Criatura;

class CriaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //carga de datos
		Criatura::create([
			'nombre_criatura' => 'Demiguise',
			'apariencia' => 'Cubierto de sedoso cabello plateado, el Demiguise tiene apariencia de simio con ojos negros y lúgubres',
			'habilidades_magicas'=> 'Puede volverse invisible cuando se lo amenaza y su piel se puede hilar en capas de invisibilidad',
			'peligros'=> null,
			'imagen' => 'imagenes/demiguise.jpg',
			'id_habitat'=>1,
			'created_at' => '2018-05-16 18:27:58'
		]);
		Criatura::create([
			'nombre_criatura' => 'Nifflers',
			'apariencia' => 'Negro y con un hocico largo',
			'habilidades_magicas'=> 'Encontrar tesoros',
			'peligros'=> 'Puede ser destructivo y no debe mantenerse en el país',
			'imagen' => 'imagenes/niffler.jpg',
			'id_habitat'=>2,
			'created_at' => '2018-05-20 18:27:58'
		]);
		Criatura::create([
			'nombre_criatura' => 'Bowtruckles',
			'apariencia' => 'Máximo de ocho pulgadas de altura, hecho de corteza y ramitas con dos pequeños ojos marrones',
			'habilidades_magicas'=> 'Camuflaje natural',
			'peligros'=> 'Tranquilo y tímido, a menos que su hábitat arbóreo esté amenazado. Tiene dedos largos y afilados',
			'imagen' => 'imagenes/bowtruckles.jpg',
			'id_habitat'=>1,
			'created_at' => '2018-05-23 18:27:58'
		]);
		Criatura::create([
			'nombre_criatura' => 'Nundus',
			'apariencia' => 'Un leopardo gigante',
			'habilidades_magicas'=> 'Se mueve silenciosamente a pesar de su tamaño, y su aliento causa enfermedades que pueden eliminar pueblos enteros',
			'peligros'=> 'Posiblemente la bestia más peligrosa del mundo debido a su aliento mortal',
			'imagen' => 'imagenes/nundus.jpg',
			'id_habitat'=>3,
			'created_at' => '2018-05-25 18:27:58'
		]);
		
		Criatura::create([
			'nombre_criatura' => 'Erumpents',
			'apariencia' => 'Muy similar a un rinoceronte en apariencia',
			'habilidades_magicas'=> 'Los cuernos de Erumpent, las colas y el líquido de explosión se usan en pociones, aunque se consideran peligrosos',
			'peligros'=> 'No atacará a menos que sea provocado, pero si carga, los resultados son catastróficos. El fluido del cuerno hará que lo que se inyecta explote',
			'imagen' => 'imagenes/erumpents.jpg',
			'id_habitat'=>3,
			'created_at' => '2018-06-05 18:27:58'
		]);
		Criatura::create([
			'nombre_criatura' => 'Swooping Evil',
			'apariencia' => 'Una gran criatura parecida a una mariposa que emerge de un pequeño objeto, posiblemente un capullo. Bestia alada azul y verde',
			'habilidades_magicas'=> null,
			'peligros'=> null,
			'imagen' => null,
			'id_habitat'=>3,
			'created_at' => '2018-06-08 18:27:58'
		]);
		Criatura::create([
			'nombre_criatura' => 'Graphorns',
			'apariencia' => 'Grande y de color púrpura grisáceo, el Graphorn tiene una espalda jorobada, dos cuernos largos y afilados y camina sobre cuatro pies manchados',
			'habilidades_magicas'=> 'El cuerno de Graphorn en polvo se usa en múltiples pociones, y la piel de Graphorn es incluso más dura que la de un dragón y repele la mayoría de los hechizos',
			'peligros'=> 'Tiene una naturaleza extremadamente agresiva',
			'imagen' => 'imagenes/graphorns.jpg',
			'id_habitat'=>4,
			'created_at' => '2018-06-16 18:27:58'
		]);		
    }
}
