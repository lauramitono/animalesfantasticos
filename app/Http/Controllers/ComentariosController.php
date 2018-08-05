<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criatura;
use App\Models\Comentario;
use Auth;
use DB;

class ComentariosController extends Controller
{
	public function cargarComentario(Request $request, $id){

		$inputData = $request->all();
        $inputData['id_user'] = auth()->id();
        $inputData['id_criatura'] = $id;
		//dd($inputData);

		$request->validate(Comentario::$rules, [
			'comentario.required' => 'Debe escribir algún comentario antes de enviar',
			'comentario.min' => 'Debe poner al menos 5 caracteres',
			'comentario.max' => 'Se excedió en la cantidad de caracteres. Máximo 255'
		]);

		Comentario::create($inputData);
		//Redirecciono
		return back()->with('status', 'El comentario se guardó correctamente');
    }
	
	public function confirmarEliminarComentario($id){
        $comentario = Comentario::find($id);
        return view('cpanel.confirmarEliminarComentario', compact('comentario'));
    }
	
	public function eliminar($id)
    {
        $comentario = Comentario::find($id);
		//dd($comentario->id_comentario);
		$comentario->delete();
		
		return redirect(url('cpanel/listado'))->with('status', 'El comentario se eliminó correctamente');
		/*return back()->with('status', 'El comentario se eliminó');*/
    }
	
	public function listarComentarios(){
		$IdUsuarioLogueado = Auth::user()->id;
		$comentarios = Comentario::all()->where('id_user', $IdUsuarioLogueado);
		
		//dd($IdUsuarioLogueado);
		//dd($comentarios);

		return view ('cpanel.listadoComentarios', [
			'comentarios' => $comentarios
		]);
	}
}
