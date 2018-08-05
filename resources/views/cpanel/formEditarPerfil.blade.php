@extends ('layout.templatepanel')

@section('titulo')
	Rescate de criaturas mágicas | Editar criatura
@stop

@section('contenidopanel')
	<h2>Editar Perfil</h2>
	<div class="row">
		<div class="col-md-6" id="form">
			<form action="<?= route('cpanel.actualizarPerfil', ['id' => $usuarioLogueado->id]);?>" method="post" enctype="multipart/form-data">
				
				@csrf
				@method('PUT')	
				
				<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" name="name" id="name" class="form-control" value="{{ old('name', $usuarioLogueado->name) }}">
					@if($errors->has('name'))
						<div class="alert alert-danger">{{ $errors->first('name') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="apellido">Apellido</label>
					<input type="text" name="apellido" id="apellido" class="form-control" value="{{ old('apellido', $usuarioLogueado->apellido) }}">
				</div>
				<div class="row img">
					<div class="col-4">
						@if(!empty($usuarioLogueado->img_users))
							<img class="img-fluid"  src="{{ url('/storage/'. $usuarioLogueado->img_users) }}" alt="foto de {{$usuarioLogueado->apellido}}">
						@else
							<p>Aún no ha subido una imagen de perfil</p>
						@endif
					</div>
					<div class="col-8">
						<div class="form-group">
							<label for="imagen">Modificar imagen de perfil</label>
							<input type="file" class="form-control" id="imagen" name="imagen" placeholder="#" value="">
						</div>
					</div>	
				</div>	
				<button class="btn btn-primary">Actualizar Perfil</button>
			</form>
		</div>	
	</div>	
@stop