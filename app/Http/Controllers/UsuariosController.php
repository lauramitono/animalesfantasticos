<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Storage;
use Image;

class UsuariosController extends Controller{
	
	
		//SE PUEDE OPTIMIZAR ESTO? PORQUE LAS DOS FUNCIONES HACEN LO MISMO SOLO QUE LLAMAN A VISTAS DISTINTAS
	//traigo todos los usuarios
	public function listarUsers(){
		$usuarios = User::all();
		//1er param: vista 
		//$usuarios: variable que llamo en la vista
		return view ('cpanel.index', [
			'usuarios' => $usuarios
		]);
	}
	
	//traigo todos los usuarios para la vista de listadoMagos
	public function listarAllUsers(){
		$usuarios = User::paginate(8);
		return view ('cpanel.listadoMagos', [
			'usuarios' => $usuarios
		]);
	}
	
	public function actualizarEstado(Request $request, $id){
		$usuarios = User::find($id);
		
		//dd($usuarios->estado);
				
		if(($usuarios->estado == 'activo')){
			DB::table('users')
			->where('id', $id)
			->update(['estado' => 'suspendido']);	
		}else{
			DB::table('users')
			->where('id', $id)
			->update(['estado' => 'activo']);
		} 
		
		//como tiene paginador lo redirijo a la misma pag en la que estaba sino iría siempre a la pag 1;
		return back();
	}
	
	public function mostrarFormEditarPerfil(){
		// Auth::user() Obtiene el objeto del Usuario Autenticado
		$usuarioLogueado = Auth::user();
		
		//dd($usuarioLogueado);
		return view ('cpanel.formEditarPerfil', [
			'usuarioLogueado' => $usuarioLogueado
		]);
	}
	
	public function editarPerfil(Request $request, $id){
		//Validación
		$request->validate(User::$rules,[
			'name.required' => 'Debe poner al menos un nombre',
			'name.min' => 'Debe poner al menos 3 caracteres',
			'name.max' => 'Se excedió en la cantidad de caracteres. Máximo 100',
			'imagen.image' => 'Debe ser una imagen'
		]);
		
		$inputData = $request->input();
		$usuario = Auth::user();
		
		//dd($inputData);
		//dd($usuario);
		
		if($request->hasfile('imagen')){
			//guardo la imagen actual
			$imagenActual = $usuario->img_users;
			
			$rutaimagen = $request->file('imagen')->store('imagenes');
			//imagenes es la carpeta que se crea en storage
			$inputData['img_users'] = $rutaimagen;		
		}
		
		$usuario->update($inputData);
		
		//borro la imagen anterior
		if(isset($imagenActual) && !empty($imagenActual)) {
            Storage::delete($imagenActual);
        }
		
		return redirect(url('cpanel/index'))->with('status', 'Los datos de su perfil se actualizaron correctamente');
	}
	
}