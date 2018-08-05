<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/criaturas', 'API\CriaturasController@listar');
Route::get('/criaturas/{id}', 'API\CriaturasController@detallesPublic');
Route::post('/criaturas', 'API\CriaturasController@cargar');
Route::delete('/criaturas/{id}', 'API\CriaturasController@eliminar');
Route::put('/criaturas/{id}', 'API\CriaturasController@editar');
