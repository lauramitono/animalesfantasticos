@extends ('layout.templatepanel')

@section('titulo')
	Rescate de criaturas mágicas | Editar criatura
@stop

@section('contenidopanel')
	<h2>Editar Criatura rescatada</h2>
	<div class="row">
		<div class="col-md-6" id="form">
			<form action="<?= route('cpanel.editar', ['id' => $criaturas->id_criatura]);?>" method="post" enctype="multipart/form-data">
				
				<!-- Token de verificación contra CSRF -->
				@csrf
				<!-- Se indica que el form va a utilizar el método PUT -->
				@method('PUT')	
				
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre_criatura" id="nombre" class="form-control" value="{{ old('nombre_criatura', $criaturas->nombre_criatura) }}">
					@if($errors->has('nombre_criatura'))
						<div class="alert alert-danger">{{ $errors->first('nombre_criatura') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="apariencia">Apariencia</label>
					<textarea class="form-control" name="apariencia" id="apariencia" rows="3">{{ old('apariencia', $criaturas->apariencia) }}</textarea>
					@if($errors->has('apariencia'))
						<div class="alert alert-danger">{{ $errors->first('apariencia') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="habilidades">Habilidades mágicas</label>
					<textarea class="form-control" name="habilidades_magicas" id="habilidades" rows="3">{{ old('habilidades_magicas', $criaturas->habilidades_magicas) }}</textarea>
					@if($errors->has('habilidades'))
						<div class="alert alert-danger">{{ $errors->first('habilidades') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="peligros">Peligros</label>
					<textarea class="form-control" name="peligros" id="peligros" rows="3">{{ old('peligros', $criaturas->peligros) }}</textarea>
					@if($errors->has('peligros'))
						<div class="alert alert-danger">{{ $errors->first('peligros') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="id_habitat">Habitat</label>
					<select name="id_habitat" id="id_habitat" class="form-control">
						@foreach($habitats as $habitat)
						<option value="{{ $habitat->id_habitat }}"
							<?php
								if(old('id_habitat', $criaturas->id_habitat) == $habitat->id_habitat) {
								echo "selected";
								}
							?>
						>
							{{ $habitat->tipo }}
						</option>
						@endforeach
					</select>	
				</div>
				
				<div class="row img">
					<div class="col-4">
						<!-- Muestro la imagen si hay -->
						@if(!empty($criaturas->imagen))
							<img class="img-fluid" src="{{url('/storage/'. $criaturas->imagen)}}" alt="Foto de {{$criaturas->nombre_criatura}}">
						@else
							<img class="img-fluid" id="preview" src="{{ url('img/maleta.jpg') }}" alt="imagen por defecto">
						@endif
					</div>
					<div class="col-8">
						<div class="form-group">
							<label for="imagen">Modificar imagen</label>
							<input type="file" class="form-control" id="imagen" name="imagen" placeholder="#" value="{{ old('imagen') }}">
							@if($errors->has('imagen'))
							<div class="alert alert-danger">{{ $errors->first('imagen') }}</div>
							@endif
						</div>
					</div>	
				</div>	
				<button class="btn btn-primary">Modificar</button>
			</form>
		</div>	
	</div>	
@stop