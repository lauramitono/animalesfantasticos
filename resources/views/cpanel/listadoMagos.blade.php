@extends('layout.templatepanel')

@section('titulo')
	Rescate de criaturas mágicas | Magos Registrados
@stop

@section('contenidopanel')
	<h2>Magos Registrados</h2>
	<table class="table magos">
		<thead>
			<tr>
				<th colspan="2">Mago</th>
				<th>Email</th>
				<th>Tipo de usuario</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		</thead>	
		<tbody>	
	<?php
		foreach($usuarios as $usuario) {
	?>
		<tr>
			<td class="align-middle">
				@if(!empty($usuario->img_users))
					<div class="avatarpadreListaUsuarios"><img class="mr-3 avatar" src="{{url('/storage/'. $usuario->img_users)}}" alt="{{ $usuario->name }}"></div>
				@else
					<div class="avatarpadreListaUsuarios"><img class="mr-3 avatar" src="{{ url('img/no_imagen_64x64.jpg') }}" alt="imagen por defecto"></div>
				@endif
			</td>	
			<td class="align-middle">
				{{$usuario->name}} {{$usuario->apellido}}
			</td>
			<td class="align-middle">
				{{$usuario->email}}
			</td>
			<td class="align-middle">
				@if($usuario->tipo_usuario == 'admin')
					<i class="fas fa-user-secret fa-lg"></i>
					{{$usuario->tipo_usuario}}
				@else
					<i class="fas fa-broom fa-lg"></i>
					{{$usuario->tipo_usuario}}
				@endif
			</td>
			<td class="align-middle">
				@if($usuario->estado == 'activo')
					<span class="status text-success">•</span>
					{{$usuario->estado}}
				@else
					<span class="status text-warning">•</span>
					{{$usuario->estado}}
				@endif
			</td>

			<td class="align-middle">
				<form method="post" action="<?= route('cpanel.actualizarEstadoUsuario', [ 'id' => $usuario->id]); ?>">
				@method("PUT")
				@csrf
					@if($usuario->tipo_usuario == 'admin')
						<button class="btn btn-warning btn-sm disabled">Cambiar estado</button>
					@else
						<button class="btn btn-warning btn-sm">Cambiar estado</button>
					@endif
				</form>
			</td>
		</tr>
		
	<?php
		} ?>
		</tbody>
	</table>
	
	<!--Paginador-->
	<div>{!!$usuarios->render()!!}</div>
@stop

