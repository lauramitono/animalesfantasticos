@extends ('layout.templatepanel')

@section('titulo')
	Rescate de criaturas mágicas | Detalle de la criatura
@stop

@section('contenidopanel')
	<div class="container detalle" id="detalle">
	@if(Session::has('status'))
		<div class="alert alert-success">{{ Session::get('status') }}</div>
	@endif
		<div class="row justify-content-center">
			<h2>{{ $criatura->nombre_criatura }}</h2>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card" >
					<div class="row">
						<div class="col-md-6">
							<div class="card-block">
								<ul>		
									<li>
										<h3>Apariencia</h3>
										<span>{{ $criatura->apariencia }}</span>
									</li>
									<li>
										<h3>Habilidades mágicas</h3>
										@if(!empty($criatura->habilidades_magicas))
											<span>{{ $criatura->habilidades_magicas }}</span>
										@else
											<span>Desconocidas</span>
										@endif
									</li>
									<li>
										<h3>Peligros</h3>
										@if(!empty($criatura->peligros))
											<span>{{ $criatura->peligros }}</span>
										@else
											<span>Desconocidos</span>
										@endif
									</li>
									<li><h3>Habitat</h3> 
										<span>{{ $criatura->habitat->tipo }}</span>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-6">
							<!-- Muestro la imagen si hay -->
							@if(!empty($criatura->imagen))
								<img class="img-fluid" src="{{url('/storage/'. $criatura->imagen)}}" alt="{{$criatura->nombre_criatura}}">
							@else
								<img class="img-fluid" id="preview" src="{{ url('img/maleta.jpg') }}" alt="imagen por defecto">
							@endif
						</div>	
					</div>
				</div>	
			</div>	
		</div>
		<div class="row justify-content-center">
			<div class="col-md-10">
				<h3>Comentarios</h3>
				<!-- Muestro la tabla si hay comentarios -->
		
				<table class="table">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Comentario</th>
							<th>Gestión</th>
						</tr>
					</thead>	
					<tbody>	
					@if(count($criatura->comentarios) > 0)
						@foreach($criatura->comentarios as $comentario)
							<tr>
								<td>{{ $comentario->usuario->name }} {{ $comentario->usuario->apellido }}</td>
								<td>{{ $comentario->comentario }}</td>
								<td><a class="btn btn-danger btn-sm" href="<?= route('cpanel.confirmarEliminarComentario', [ 'id' => $comentario->id_comentario]); ?>">Eliminar</a></td>
							<tr>	
						@endforeach
					@else
						<tr>
							<td colspan=3>No hay comentarios para esta criatura</td>
						</tr>
					@endif
					</tbody>
				</table>
			</div>
		</div>
		
		
		<div class="row justify-content-center">
			<a href="{{url()->previous()}}" class="btn btn-primary mb-3">Volver</a>	
		</div>
	</div>
@stop