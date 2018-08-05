@extends('layout.templatepanel')

@section('titulo')
	Rescate de criaturas mágicas | Criaturas rescatadas
@stop

@section('contenidopanel')
	<h2>Criaturas mágicas rescatadas</h2>
	
	@if(Session::has('status'))
		<div class="alert alert-success">{{ Session::get('status') }}</div>
	@endif
	
	<table class="table criaturas">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Imagen</th>
				<th>Apariencia</th>
				<th>Habitat</th> 
				<th>Gestión</th>
			</tr>
		</thead>	
		<tbody>	
	<?php
		foreach($criaturas as $unaCriatura) {
	?>
		<tr>
			<td>{{$unaCriatura->nombre_criatura}}</td>
			<td>
				<!-- Muestro la imagen si hay -->
				@if(!empty($unaCriatura->imagen))
					<img class="img-fluid" id="preview" src="{{ url('/storage/'. $unaCriatura->imagen) }}" alt="{{$unaCriatura->nombre_criatura}}">
				@else
					<img class="img-fluid" id="preview" src="{{ url('img/maleta.jpg') }}" alt="imagen por defecto">
				@endif
			</td>
			<td>{{$unaCriatura->apariencia}}</td>
			<td>{{$unaCriatura->habitat->tipo}}</td>
			<td>
				<a class="btn btn-info btn-sm" href="<?= url('cpanel/' . $unaCriatura->id_criatura); ?>">Observar</a>
				<a class="btn btn-warning btn-sm" href="<?= route('cpanel.formEditar', ['id' => $unaCriatura->id_criatura]);?>">Editar</a>
				<a class="btn btn-danger btn-sm" href="<?= route('cpanel.confirmarEliminar', [ 'id' => $unaCriatura->id_criatura]); ?>">Eliminar</a>
			</td>
		</tr>
	<?php
		} ?>
		</tbody>
	</table>
@stop

