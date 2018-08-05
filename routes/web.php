<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Vistas públicas
Route::get('/', 'HomeController@index');
Route::get('/public/criaturas', 'CriaturasController@listarPublic');
Route::get('/public/formReportar', 'AvistamientosController@showReportar');
Route::post('/public/formReportar', 'AvistamientosController@reportar');
Route::get('/public/{id}', 'CriaturasController@detallesPublic');

//Para el registro
Route::get('registrarse', [
	'as' => 'auth.mostrarRegistro',
	'uses' => 'AuthController@mostrarRegistro'
]);
Route::post('registrarse', [
	'as' => 'auth.doRegistro',
	'uses' => 'AuthController@doRegistro'
]);

//Para el login
Route::get('login', [
	'as' => 'login',
	'uses' => 'AuthController@mostrarLogin'
]);
Route::post('login', [
	'as' => 'auth.hacerLogin',
	'uses' => 'AuthController@hacerLogin'
]);
Route::get('logout', [
	'as' => 'auth.logout',
	'uses' => 'AuthController@logout'
]);

//RUTA BLOQUEADA PARA USUARIOS NO REGISTRADOS
Route::middleware('auth')->group(function(){
	
	//Vista Principal del panel
	Route::get('/cpanel/index', 'UsuariosController@listarUsers');
	
	//Edición de Perfil
	Route::get('/cpanel/formEditarPerfil', [
		'as' => 'cpanel.editarPerfil',
		'uses' => 'UsuariosController@mostrarFormEditarPerfil',
	]);
	Route::put('/cpanel/{id}/actualizarPerfil', [
		'as' => 'cpanel.actualizarPerfil',
		'uses' => 'UsuariosController@editarPerfil',
	]);
	
	//Comentarios
	Route::get('/cpanel/listadoComentarios', 'ComentariosController@listarComentarios');
	Route::put('/criaturas/{criatura}/comentarios', [
		'as' => 'criaturas.comentarios',
		'uses' => 'ComentariosController@cargarComentario',
	]);

});

//RUTAS BLOQUEADAS PARA USUARIOS QUE NO SON ADMIN
Route::middleware('admin')->group(function(){
	
	//Magos
	Route::get('/cpanel/listadoMagos', 'UsuariosController@listarAllUsers'); 
	Route::put('/cpanel/{id}/listadoMagos', [
		'as' => 'cpanel.actualizarEstadoUsuario',
		'uses' => 'UsuariosController@actualizarEstado',
	]);
	
	//Criaturas
	Route::get('/cpanel/listado', 'CriaturasController@listar');
	Route::get('/cpanel/formAlta', 'CriaturasController@mostrarFormAlta');
	Route::post('/cpanel/formAlta', 'CriaturasController@cargar');
	Route::get('/cpanel/{id}/editar', [
		'as' => 'cpanel.formEditar',
		'uses' => 'CriaturasController@mostrarFormEditar',
	]);
	Route::put('/cpanel/{id}/editar', [
		'as' => 'cpanel.editar',
		'uses' => 'CriaturasController@editar',
	]);
	Route::get('/cpanel/{id}/eliminar', [
		'as' => 'cpanel.confirmarEliminar',
		'uses' => 'CriaturasController@confirmarEliminar',
	]);
	Route::delete('/cpanel/{id}/eliminar', [
		'as' => 'cpanel.eliminar',
		'uses' => 'CriaturasController@eliminar',
	]);
	
	//Comentarios
	Route::get('/detalles/{id}/eliminar', [
		'as' => 'cpanel.confirmarEliminarComentario',
		'uses' => 'ComentariosController@confirmarEliminarComentario',
	]);
	Route::delete('/detalles/{id}/eliminar', [
		'as' => 'detalles.eliminar',
		'uses' => 'ComentariosController@eliminar',
	]);

	//Avistamientos
	Route::get('/cpanel/avistamientos', 'AvistamientosController@listarAvistamientos');
	Route::put('/cpanel/{id}/avistamientos', [
		'as' => 'cpanel.actualizarEstadoAvistamiento',
		'uses' => 'AvistamientosController@actualizarEstado',
	]);
	Route::delete('/cpanel/{id}/avistamientos', [
		'as' => 'cpanel.EliminarAvistamiento',
		'uses' => 'AvistamientosController@eliminar',
	]);
	
	//Gráficas
	Route::get('/cpanel/graficas', 'GraficasController@mostrarGraficas');
	
	//Detalles Criaturas
	Route::get('/cpanel/{id}', 'CriaturasController@detalles');	
});




