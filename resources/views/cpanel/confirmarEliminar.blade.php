@extends('layout.templatepanel')

@section('titulo')
	Rescate de criaturas mágicas | Confirmación de eliminación
@stop

@section('contenidopanel')
	<h2>Confirmación de eliminación</h2>
	<p>Se ha perdido la criatura nuevamente? Confirma su eliminación de la lista de criaturas rescatadas?</p>
	
	<form method="POST" action="{{ route('cpanel.eliminar', ['id' => $criatura->id_criatura]) }}">
		@csrf
		@method('DELETE')
		<button class="btn btn-danger">Confirmar</button>
	</form>
@stop
