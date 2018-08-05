@extends ('layout.template')

@section('titulo')
	Rescate de animales fantásticos | Registro
@stop

@section('contenido')
	<div class="container-fluid" id="login">
		<div class="row">
			<div class="col-md-4 col-center">
				<h2>Registro</h2>
				
				@if(Session::has('status'))
					<div class="alert alert-danger">{{ Session::get('status') }}</div>
				@endif
		
				<form action="{{ route('auth.doRegistro') }}" method="post">
					<!-- Token de verificación contra CSRF -->
					@csrf
					
					<div class="form-group">
						<label for="name">Nombre</label>
						<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
						@if($errors->has('name'))
							<div class="alert alert-danger">{{ $errors->first('name') }}</div>
						@endif
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="mail" name="email" id="email" class="form-control" value="{{ old('email') }}">
						@if($errors->has('email'))
							<div class="alert alert-danger">{{ $errors->first('email') }}</div>
						@endif
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control">
						@if($errors->has('password'))
							<div class="alert alert-danger">{{ $errors->first('password') }}</div>
						@endif
					</div>
					<div class="form-group">
						<label for="password_confirmation">Confirmar Password</label>
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
					</div>
					
					<button class="btn btn-primary">Registrarse</button>
				</form>
				<p>Ya te habías registrado? Ingresá desde <span><a href="{{ route('login') }}">Aquí</a></span></p>
			</div>
		</div>	
	</div>
@stop