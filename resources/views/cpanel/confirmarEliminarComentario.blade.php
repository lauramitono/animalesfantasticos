@extends('layout.templatepanel')

@section('titulo')
	Rescate de criaturas mágicas | Confirmación de eliminación
@stop

@section('contenidopanel')
	<h2>Confirmación de eliminación</h2>
	<p>Está seguro que quiere eliminar este comentario?</p>
	
	<form method="POST" action="{{ route('detalles.eliminar', ['id' => $comentario->id_comentario]) }}">
		@csrf
		@method('DELETE')
		<button class="btn btn-danger">Confirmar</button>
	</form>
@stop
