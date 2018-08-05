<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class AuthController extends Controller{
	
	//Registro
	public function mostrarRegistro(){
    	return view('auth.registro');
    }
	
	public function doRegistro(Request $request){
    	$request->validate([
    		'name' => 'required|min:3|max:100',
    		'email' => 'required|email|max:255|unique:users',
    		'password' => 'required|min:3|confirmed',
		]);

		//pido todos los inputs
		$input = $request->input();
		
		//hasheo el password
		$input['password'] = \Hash::make($input['password']);
		$user = User::create($input);

		return redirect('/login')->with('status', 'Usuario registrado con éxito!');
    }
	
	//Login
	public function mostrarLogin(){
		return view('auth.login');
	}
	
	public function hacerLogin(Request $request){
		
		//traigo los inputs
		$input = $request->input();
		
		//autenticación del usuario 
		if(!Auth::attempt(['password' => $input['password'], 'email' => $input['email']])){
			//si sale mal lo redirecciono al login 
			return redirect()->route('login')
				//mando los datos de nuevo
				->withInput()
				//mando mensaje de error
				->with('status', 'E-mail y/o password incorrectos');			
		}
		
		if(Auth::user()->tipo_usuario == 'admin'){
			//si sale bien lo redirecciono a la pantalla desde donde intento ingresar antes de loguearse o al index
			return redirect()->intended('/cpanel/index');
			
		}else{
			if(Auth::user()->estado == 'suspendido'){
				return redirect()->route('login')
				//mando mensaje de error
				->with('status', 'Usted fue suspendido para poder acceder contáctese con el administrador: newt@criaturas.com.ar');			
			}else{
				return redirect()->intended('/cpanel/index');
			}	
		}
	}
	
	public function logout()
    {
		session()->flush();
    	Auth::logout();
    	return redirect('/');
    }
	
}