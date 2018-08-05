@extends ('layout.template')

@section('titulo')
	Rescate de criaturas mágicas | Detalle de la criatura
@stop

@section('contenido')
	<div class="container-fluid" id="detalle">
	@if(Session::has('status'))
		<div class="alert alert-success">{{ Session::get('status') }}</div>
	@endif
		<div class="row justify-content-center">
			<h2>{{ $criatura->nombre_criatura }}</h2>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-7">
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
									<li>
										<h3>Habitat</h3> 
										<span>{{ $criatura->habitat->tipo }}</span>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-6">
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
			<div class="col-md-7 comentarios">
				<h3>Comentarios</h3>
				@if(Auth::check())
					<form class="form-inline" action="{{ route('criaturas.comentarios', ['id' => $criatura->id_criatura]) }}" method="post">
						<!-- Token de verificación contra CSRF -->
						@csrf
						@method('PUT')
						<div class="form-row">
							<div class="col">
								<textarea type="text" name="comentario" class="form-control" rows="3" value="{{ old('comentario') }}" placeholder="Ingrese un comentario" ></textarea>
							@if($errors->has('comentario'))
								<div class="alert alert-danger">{{ $errors->first('comentario') }}</div>
							@endif
							</div>
							<div class="col">
								<button class="btn btn-sussesc">Comentar</button>
							</div>
						</div>
					</form>
				@else
					<p class="mensaje_comentar">Si querés comentar necesitas <a class="nav-link" href="{{ route('login') }}">loguearte</a></p>	
				@endif
				<ul class="list-unstyled">
					@foreach($criatura->comentarios as $comentario)
						<li class="media">
						@if(!empty($comentario->usuario->img_users))
								<div class="avatarpadre"><img class="mr-3 avatar" src="{{url('/storage/'. $comentario->usuario->img_users)}}" alt="Foto de {{ $comentario->usuario->name }}"></div>
							@else
								<div class="avatarpadre"><img class="mr-3 avatar" src="{{ url('img/no_imagen_64x64.jpg') }}" alt="imagen por defecto"></div>
							@endif
							<div class="media-body">
								<h4 class="mt-0 mb-1">{{ $comentario->usuario->name }}</h4>
								<p>{{ $comentario->comentario }}</p>
							</div>
						</li>
					@endforeach  
				</ul> 
			</div>
		</div>			
		<div class="row justify-content-center">
			<!--<a href="{{url()->previous()}}" class="btn btn-primary mb-3">Volver</a>	-->
			<a href="<?= url('public/criaturas');?>"" class="btn btn-primary mb-3">Volver</a>
		</div>
	</div>
@stop