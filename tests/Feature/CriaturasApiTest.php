<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriaturasApiTest extends TestCase
{
    //reconstruyo las migraciones.
	use RefreshDatabase;

	//seteo de seeders
	public function setUp()
	{
		//llamo al setUp de laravel que hace el RefreshDatabase
		parent::setUp();

		//llamo al comando de artisan
		$this->artisan('db:seed');
	}
		
	public function testLeerTodasLasCriaturas(){
		//realizo la peticion a /api/criaturas y almaceno el json en $respuesta		
		$respuesta = $this->json('GET', '/api/criaturas');
		
		//que retorne la cantidad de criaturas de la base de datos y status 200
		$respuesta->assertStatus(200)
				->assertJsonCount(7);
	}
	
	public function testElListadoDeCriaturasTraeBowtruckles(){
		$respuesta = $this->json('GET', '/api/criaturas');

        // assertJsonFragment verifica que la respuesta contenga los datos que le indiquemos
    	$respuesta->assertJsonFragment([
    		'nombre_criatura' => 'Bowtruckles'
		]);	
	}
	
	public function testTraigoCriatura5()
    {
    	$respuesta = $this->json('GET', '/api/criaturas/5');

    	$respuesta
    		->assertStatus(200)
    		->assertJson([
	    		'nombre_criatura' => 'Erumpents'
			]);
    }
	
	public function testPuedoCrearCriaturasNuevas()
    {
    	$respuesta = $this->json('POST', '/api/criaturas', [
    		'nombre_criatura' => 'Criaturita test',
    		'apariencia' => 'Grande',
    		'habilidades_magicas' => 'Puede convertirte en ratón',
    		'peligros' => 'Estornuda fuerte',
    		'imagen' => 'img/maleta.jpg',
    		'id_habitat' => 2
		]);

		$respuesta
			->assertStatus(200)
			->assertJson(['success' => true]);
    }
	
	public function testChequeaValidacion()
    {
    	$respuesta = $this->json('POST', '/api/criaturas', [
    		'nombre_criatura' => null,
    		'apariencia' => null,
    		'habilidades_magicas' => 'Puede convertirte en ratón',
    		'peligros' => 'Estornuda fuerte',
    		'imagen' => 'img/maleta.jpg',
    		'id_habitat' => 2
		]);

		$respuesta
			->assertStatus(422)
			->assertJsonValidationErrors(['nombre_criatura'],['apariencia']);
    }
	
	public function testEliminoUnaCritura(){
		$respuesta = $this->json('DELETE', '/api/criaturas/5');
		$respuesta
			->assertStatus(200)->assertJson([
				'nombre_criatura' => 'Erumpents'
			]);
	}
	
	public function testPuedoEditarUnaCriatura()
    {
    	$respuesta = $this->json('PUT', '/api/criaturas/3', [
    		'nombre_criatura' => 'Criaturita test editada',
    		'apariencia' => 'Ahora es pequeña',
    		'habilidades_magicas' => 'Puede convertirte en habichuela',
    		'peligros' => 'Se hace pis encima',
    		'imagen' => 'img/maleta.jpg',
    		'id_habitat' => 3
		]);

		$respuesta
			->assertStatus(200)
			->assertJson(['success' => true]);
    }
}
