<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Criatura;

class CriaturasController extends Controller
{
    public function listar(){
		$criaturas = Criatura::all();

    	// Retorno el JSON
    	return response()->json($criaturas);
	}
	
	public function detallesPublic($id)
    {
    	$criatura = Criatura::find($id);

    	return response()->json($criatura);
    }
	
	public function cargar(Request $request)
    {
    	$inputData = $request->all();

		$request->validate(Criatura::$rules);

    	$criatura = Criatura::create($inputData);

    	return response()->json([
    		'success' => true,
    		'data' => $criatura
		]);
    }
	
	public function eliminar($id){
		$criatura = Criatura::find($id);
		$criatura->delete();
		return response()->json($criatura);
	}
	
	public function editar(Request $request, $id)
    {
		$request->validate(Criatura::$rules);
		
		$inputData = $request->input();
		$criatura = Criatura::find($id);
		$criatura->update($inputData);

    	return response()->json([
    		'success' => true,
    		'data' => $criatura
		]);
    }
}
