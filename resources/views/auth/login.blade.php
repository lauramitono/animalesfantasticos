@extends ('layout.template')

@section('titulo')
	Rescate de animales fantásticos | Acceso magos
@stop

@section('contenido')
	<div class="container-fluid" id="login">
		<div class="row">
			<div class="col-md-4 col-center">
				<h2>Acceso magos</h2>
				
				@if(Session::has('status'))
					<div class="alert alert-warning">{{ Session::get('status') }}</div>
				@endif
		
				<form action="{{ route('auth.hacerLogin') }}" method="post">
					<!-- Token de verificación contra CSRF -->
					@csrf
					
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="mail" name="email" id="email" class="form-control" value="{{ old('email') }}">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
					</div>
					
					<button class="btn btn-primary">Acceder</button>
				</form>
				<p>Aún no te registraste? Hacelo <span><a href="{{ route('auth.mostrarRegistro') }}">Aquí</a></span></p>
			</div>
		</div>	
	</div>
@stop