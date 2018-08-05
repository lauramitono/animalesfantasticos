<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GraficasController extends Controller
{
	
	public function mostrarGraficas(){
		
		$tiposUsuarios = DB::select("SELECT COUNT(id) as total, tipo_usuario FROM users GROUP BY tipo_usuario");
		
		$estadosUsuarios = DB::select("SELECT COUNT(id) as total, estado FROM users GROUP BY estado");
		
		$criaturasPorHabitat = DB::select("SELECT count(id_criatura) as total, habitats.tipo FROM criaturas LEFT JOIN habitats ON criaturas.id_habitat = habitats.id_habitat GROUP BY habitats.tipo");
		
		$estadosAvistamientos = DB::select("SELECT COUNT(id_avistamiento) as total, estado FROM avistamientos GROUP BY estado");
		
		
		$ultimosusuarios = DB::select("SELECT * FROM users ORDER BY created_at DESC LIMIT 4");
		
		$ultimascriaturas = DB::select("SELECT * FROM criaturas ORDER BY created_at DESC LIMIT 4");
		
		$ultimoscomentarios = DB::select("SELECT * FROM comentarios LEFT JOIN users ON comentarios.id_user = users.id ORDER BY comentarios.created_at DESC LIMIT 2");
		
		$ultimosavistamientos = DB::select("SELECT * FROM avistamientos ORDER BY created_at DESC LIMIT 5");
		
		//$totalusuarios = DB::select("SELECT COUNT(id) as total FROM users");
		$totalusuarios = DB::table('users')->count();
		
		//$totalcriaturas = DB::select("SELECT COUNT(id_criatura) as total FROM criaturas");
		$totalcriaturas = DB::table('criaturas')->count();
		
		return view ('cpanel.graficas', [
			'tiposUsuarios' => $tiposUsuarios,
			'estadosUsuarios' => $estadosUsuarios,
			'criaturasPorHabitat' => $criaturasPorHabitat,
			'estadosAvistamientos' => $estadosAvistamientos,
			'ultimosusuarios' => $ultimosusuarios,
			'ultimascriaturas' => $ultimascriaturas,
			'ultimoscomentarios' => $ultimoscomentarios,
			'ultimosavistamientos' => $ultimosavistamientos,
			'totalusuarios' => $totalusuarios,
			'totalcriaturas' => $totalcriaturas
		]);
	}
    
}
