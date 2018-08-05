@extends('layout.templatepanel')

@section('titulo')
	Rescate de criaturas mágicas | Dashboard
@stop

@section('contenidopanel')
	<h2>Equipo de rescate</h2>
	
	@if(Session::has('status'))
		<div class="alert alert-success">{{ Session::get('status') }}</div>
	@endif
	
	<div class="row" id="equipo">
			<?php
				foreach($usuarios as $unUsuario) {
				if ($unUsuario->tipo_usuario == 'admin'){
			?>
				<div class="col-md-6">
					<div class="card" >
						<div class="row">
							<div class="col-md-6">
								<div class="card-block">
									<h3 class="card-title">{{$unUsuario->name}} {{$unUsuario->apellido}}</h3>
									<p class="card-text">{{$unUsuario->email}}</p>
								</div>
							</div>
							<div class="col-md-6">
								<img class="img-fluid" src="{{url('/storage/'. $unUsuario->img_users)}}" alt="{{$unUsuario->name}}">
							</div>	
						</div>
					</div>	
				</div>
			<?php
				}
				} 
			?>
        </div>
@stop
