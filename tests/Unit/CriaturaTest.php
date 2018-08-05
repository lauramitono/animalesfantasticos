<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Criatura;
use App\Repositories\Contracts\CriaturaRepository;

class CriaturaTest extends TestCase
{
	use RefreshDatabase;
	
	public function testMostrarIndex(){
		
		$this->get('/')
			->assertStatus(200)
			//lo que espero ver
			->assertSee('Rescate de Criaturas Mágicas');
	}
	
	public function testMostrarListadoPublicoDeCriaturas(){
		
		$this->get('/public/criaturas')
			->assertStatus(200)
			//lo que espero ver
			->assertSee('Criaturas mágicas encontradas')
			//variable que espero que reciba $criaturas
			->assertViewHas('criaturas');
	}
	
	/*public function testMostrarElDetalleDeUnaCriatura(){
		
		$this->get('/public/3')
			->assertStatus(200)
			->assertSee('Bowtruckles');
	}*/
	
	public function testMostrarFormAvistamientos(){
		
		$this->get('/public/formReportar')
			->assertStatus(200)
			//lo que espero ver
			->assertSee('Infórmenos sobre la criatura avistada');
	}
	
	
}
