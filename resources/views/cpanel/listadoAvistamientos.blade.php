@extends('layout.templatepanel')

@section('titulo')
	Rescate de criaturas mágicas | Avistamientos
@stop

@section('contenidopanel')
	<h2>Avistamientos</h2>
	
	@if(Session::has('status'))
		<div class="alert alert-success">{{ Session::get('status') }}</div>
	@endif
	
	<table class="table avistamientos">
		<thead>
			<tr>
				<th>Reportado</th>
				<th>Lugar</th>
				<th>Apariencia de la criatura</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		</thead>	
		<tbody>	
	<?php
		foreach($avistamientos as $unAvistamiento) {
	?>
		<tr>
			<td class="align-middle">
				{{$unAvistamiento->created_at->format('d-M-Y h:m')}}
			</td>
			<td class="align-middle">
				{{$unAvistamiento->lugar}}
			</td>
			<td class="align-middle">
				{{$unAvistamiento->apariencia}}
			</td>
			<td class="align-middle">
				@if($unAvistamiento->estado == 'encontrada')
					<span class="status text-success">•</span>
					{{$unAvistamiento->estado}}
				@else
					<span class="status text-danger">•</span>
					{{$unAvistamiento->estado}}
				@endif
			</td>
			<td class="align-middle">
				<form method="post" action="<?= route('cpanel.actualizarEstadoAvistamiento', [ 'id' => $unAvistamiento->id_avistamiento]); ?>">
				@method("PUT")
				@csrf
					<button class="btn btn-warning btn-sm">Cambiar estado</button>
				</form>
				<form method="post" action="<?= route('cpanel.EliminarAvistamiento', [ 'id' => $unAvistamiento->id_avistamiento]); ?>">
				@method("DELETE")
				@csrf
					@if($unAvistamiento->estado == 'encontrada')
						<button class="btn btn-danger btn-sm">Eliminar</button>
					@else
						<button class="btn btn-danger btn-sm disabled">Eliminar</button>
					@endif
				</form>
			</td>
		</tr>
	<?php
		} ?>
		</tbody>
	</table>
@stop

