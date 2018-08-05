<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avistamiento;
use Auth;
use DB;


class AvistamientosController extends Controller{
	
	//traigo todos los avistamientos
	public function listarAvistamientos(){
		$avistamientos = Avistamiento::all();
		
		return view ('cpanel.listadoAvistamientos', [
			'avistamientos' => $avistamientos
		]);
	}

	public function showReportar(){
		return view ('public.formReportar');
	}
	
	public function reportar(Request $request){
		$inputData = $request->all();
		
		//Validación
		$request->validate(Avistamiento::$rules,[
			'lugar.required' => 'Debe indicar dónde vio a la criatura',
			'lugar.min' => 'Debe poner al menos 5 caracteres',
			'lugar.max' => 'Se excedió en la cantidad de caracteres. Máximo 100',
			'apariencia.required' => 'Debe especificar cómo era la criatura',
			'apariencia.min' => 'Debe poner al menos 5 caracteres'		
		]);
		
		Avistamiento::create($inputData);
					
		//Redirecciono
		return redirect(url('/'))->with('status', 'Su reporte se envió correctamente');
	}
	
	public function actualizarEstado(Request $request, $id){
		$avistamientos = Avistamiento::find($id);
		
		//dd($avistamientos->estado);
		if(($avistamientos->estado == 'encontrada')){
			DB::table('avistamientos')
			->where('id_avistamiento', $id)
			->update(['estado' => 'perdida']);	
		}else{
			DB::table('avistamientos')
			->where('id_avistamiento', $id)
			->update(['estado' => 'encontrada']);
		} 
		return redirect(url('cpanel/avistamientos'));
	}
	
	public function eliminar($id){
		$avistamientos = Avistamiento::find($id);
		$avistamientos->delete();
		return redirect(url('cpanel/avistamientos'))->with('status', 'Avistamiento eliminado');;
	}
	
}