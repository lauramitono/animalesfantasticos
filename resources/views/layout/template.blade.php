<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
							@if(Auth::user()->tipo_usuario == 'user')
							<li class="nav-item">
								<a class="nav-link" href="<?= url('public/formReportar');?>">Reportar criatura</a>
							</li>
							@endif
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
			@yield('contenido')
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