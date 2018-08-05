@extends('layout.template')

@section('titulo')
	Rescate de criaturas mágicas | Criaturas rescatadas
@stop

@section('contenido')
	<div class="container" id="listadopublic">
		<div class="row justify-content-center">
			<h2>Criaturas mágicas encontradas</h2>
		</div>
		<div class="row">
			<?php
				foreach($criaturas as $unaCriatura) {
			?>
				<div class="col-md-6">
					<div class="card" >
						<div class="row">
							<div class="col-md-6">
								<div class="card-block">
									<h3 class="card-title">{{$unaCriatura->nombre_criatura}}</h3>
									<p class="card-text">{{$unaCriatura->apariencia}}</p>
									<a href="<?= url('public/' . $unaCriatura->id_criatura); ?>">Observar</a>
								</div>
							</div>
							<div class="col-md-6">
								@if(!empty($unaCriatura->imagen))
									<img class="img-fluid" src="{{url('/storage/'. $unaCriatura->imagen)}}" alt="{{$unaCriatura->nombre_criatura}}">
								@else
									<img class="img-fluid" id="preview" src="{{ url('img/maleta.jpg') }}" alt="imagen por defecto">
								@endif
							</div>	
						</div>
					</div>	
				</div>
			<?php
				} 
			?>
        </div>
					
	</div>
@stop

