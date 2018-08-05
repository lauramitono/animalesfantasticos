<?php

use Illuminate\Database\Seeder;
use App\Models\Habitat;

class HabitatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //carga de datos
		Habitat::create([
			'tipo' => 'Bosques'		
		]);
		Habitat::create([
			'tipo' => 'Guaridas'		
		]);
		Habitat::create([
			'tipo' => 'Desiertos'		
		]);
		Habitat::create([
			'tipo' => 'Montañas'		
		]);
    }
}
