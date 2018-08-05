@extends('layout.template')

@section('titulo')
	Rescate de criaturas mágicas | Criaturas rescatadas
@stop

@section('contenido')
	<div class="container-fluid" id="formpublic">
		<div class="row justify-content-center">
			<h2>Infórmenos sobre la criatura avistada</h2>
		</div>
		<div class="row">
			<div class="col-md-5 col-center">
				<form action="<?= url('/public/formReportar');?>" method="post">
					<!-- Token de verificación contra CSRF -->
					@csrf
					
					<div class="form-group">
						<label for="lugar">Dónde la vió?</label>
						<input type="text" name="lugar" id="lugar" class="form-control" value="{{ old('lugar') }}">
						@if($errors->has('lugar'))
							<div class="alert alert-danger">{{ $errors->first('lugar') }}</div>
						@endif
					</div>
					<div class="form-group">
						<label for="apariencia">Cómo era?</label>
						<textarea class="form-control" name="apariencia" id="apariencia" rows="3">{{ old('apariencia') }}</textarea>
						@if($errors->has('apariencia'))
							<div class="alert alert-danger">{{ $errors->first('apariencia') }}</div>
						@endif
					</div>
					
					<button class="btn btn-primary">Informar</button>
				</form>
			</div>
		</div>	
					
	</div>
@stop

