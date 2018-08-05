@extends ('layout.templatepanel')

@section('titulo')
	Rescate de criaturas mágicas | Alta de criatura
@stop

@section('contenidopanel')
	
	<h2>Cargar Criatura rescatada</h2>
	<div class="row">
		<div class="col-md-6" id="form">
			<form action="<?= url('/cpanel/formAlta');?>" method="post" enctype="multipart/form-data">
				
				<!-- Token de verificación contra CSRF -->
				@csrf
					
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre_criatura" id="nombre" class="form-control" value="{{ old('nombre_criatura') }}">
					@if($errors->has('nombre_criatura'))
						<div class="alert alert-danger">{{ $errors->first('nombre_criatura') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="apariencia">Apariencia</label>
					<textarea class="form-control" name="apariencia" id="apariencia" rows="3">{{ old('apariencia') }}</textarea>
					@if($errors->has('apariencia'))
						<div class="alert alert-danger">{{ $errors->first('apariencia') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="habilidades">Habilidades mágicas</label>
					<textarea class="form-control" name="habilidades_magicas" id="habilidades" rows="3">{{ old('habilidades_magicas') }}</textarea>
					@if($errors->has('habilidades'))
						<div class="alert alert-danger">{{ $errors->first('habilidades') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="peligros">Peligros</label>
					<textarea class="form-control" name="peligros" id="peligros" rows="3">{{ old('peligros') }}</textarea>
					@if($errors->has('peligros'))
						<div class="alert alert-danger">{{ $errors->first('peligros') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="id_habitat">Habitat</label>
					<select name="id_habitat" id="id_habitat" class="form-control">
						@foreach($habitats as $habitat)
						<option value="{{ $habitat->id_habitat }}">
							{{ $habitat->tipo }}
						</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="imagen">Cargar imagen</label>
					<input type="file" class="form-control" id="imagen" name="imagen" placeholder="#" value="{{ old('imagen') }}">
					@if($errors->has('imagen'))
					<div class="alert alert-danger">{{ $errors->first('imagen') }}</div>
					@endif
				</div>
				<button class="btn btn-primary">Cargar</button>
			</form>	
		</div>
	</div>		
@stop