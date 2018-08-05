<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

		<!-- Font Awesome-->
		<link rel="stylesheet" href="<?= url('css/vendor/fontawesome/css/solid.css');?>">
		<link rel="stylesheet" href="<?= url('css/vendor/fontawesome/css/regular.css');?>">
		<link rel="stylesheet" href="<?= url('css/vendor/fontawesome/css/brands.css');?>">
		<link rel="stylesheet" href="<?= url('css/vendor/fontawesome/css/fontawesome.css');?>">

        <!-- Styles -->
		<link rel="stylesheet" href="<?= url('css/app.css');?>">
		<link rel="stylesheet" href="<?= url('css/animalesfantasticos.css');?>">
  
    </head>
    <body>
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="<?= url('/');?>">Rescate de criaturas mágicas</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="<?= url('public/criaturas');?>">Criaturas mágicas encontradas</a>
						</li>
											
						@if(Auth::check())
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="<?= url('cpanel/index');?>">Ir al panel</a>
									<a class="dropdown-item" href="{{ route('auth.logout') }}">Salir</a>
								</div>
							</li>
						@else
						<li class="nav-item">
							<a class="nav-link" href="<?= url('public/formReportar');?>">Reportar criatura</a>
						</li>
                        <li class="nav-item" id="acceso">
							<a class="nav-link" href="{{ route('login') }}">Acceso magos</a>
						</li>
						@endif
					</ul>
                </div>
			</nav>
		</header>	
		
		<main>
			<div class="container-fluid">
				<div class="row" id="dashboard">
					<div class="col-sm-2 panel">
						<div class="box-usuario-panel">
							<div class="avatar-usuario-logueado">
								@if(!empty(Auth::user()->img_users))
									<img class="mr-3 avatar" src="{{url('/storage/'. Auth::user()->img_users)}}" alt="{{ Auth::user()->name  }}">
								@else
									<img class="mr-3 avatar" src="{{ url('img/no_imagen_64x64.jpg') }}" alt="imagen por defecto">
								@endif	
							</div>
							<div>
								<p>{{ Auth::user()->name }}</p>
								<a class="nav-link" href="<?= url('cpanel/formEditarPerfil');?>"><i class="fas fa-cog fa-lg"></i> Editar Perfil</a>
							</div>	
						</div>
						<ul class="nav flex-column">
							@if(Auth::user()->tipo_usuario == 'admin')
								<li class="nav-item">
									<a class="nav-link" href="<?= url('cpanel/index');?>"><i class="far fa-address-card fa-lg"></i> Equipo de rescate</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= url('cpanel/listado');?>"><i class="fab fa-earlybirds fa-lg"></i> Criaturas rescatadas</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= url('cpanel/formAlta');?>"><i class="fas fa-feather-alt fa-lg"></i> Cargar criatura</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= url('cpanel/avistamientos');?>"><i class="fas fa-binoculars fa-lg"></i> Avistamientos</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= url('cpanel/listadoMagos');?>"><i class="fas fa-broom fa-lg"></i> Magos registrados</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= url('cpanel/graficas');?>"><i class="far fa-chart-bar fa-lg"></i> Estadísticas</a>
								</li>
							@else
								<li class="nav-item">
									<a class="nav-link" href="<?= url('cpanel/index');?>"><i class="far fa-address-card fa-lg"></i> Equipo de rescate</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= url('cpanel/listadoComentarios');?>"><i class="far fa-comment-dots fa-lg"></i> Mis comentarios</a>
								</li>
								<li>
									<a class="nav-link" href="<?= url('public/formReportar');?>"><i class="fas fa-binoculars fa-lg"></i> Reportar criatura</a>
								</li>	
							@endif	
						</ul>
					</div>
					<div class="col-sm-10 contenido">
						@yield('contenidopanel')
					</div>	
				</div>
			</div>
			
		</main>
		
		<footer>	
			<div class="container">
				<div class="row">
					<div class="col">
						<p>Rescate de criaturas mágicas</p>
						<ul>
							<li>Aplicaciones Enrriquecidas  |  Prof. Santiago Gallino</li>
							<li>Alum. María Laura Mitono  |  DW5ATN 2018</li>
							<li>Primera Escuela de Arte Multimedial Da Vinci</li>
						</ul>
					</div>
				</div>
			</div>	
		</footer>
		
		<script src="<?= url('js/app.js');?>"></script>
		
    </body>
</html>