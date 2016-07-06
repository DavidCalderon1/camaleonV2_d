<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- este layout es el original de la plantilla de menu multilevel -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="{{{ '/menu_multilevel/img/logo-01.ico' }}}">
		{!! Html::style('assets/css/bootstrap.css') !!}
		{!!Html::style('menu1/css/metisMenu.min.css')!!}
		{!!Html::style('menu1/css/sb-admin-2.css')!!}
		{!!Html::style('menu1/css/font-awesome.min.css')!!}
		{!!Html::style('menu1/css/style.css')!!}
		
		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	 
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="">Camaleon Admin</a>
				</div>
				<ul class="nav navbar-top-links navbar-right">
					 <li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						 <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
							</li>
							<li class="divider"></li>
							<li><a href="{!!URL::to('/logout')!!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">
							<li>
								<a href="#"><span class="label label-primary">1</span><i class="fa fa-sort-amount-asc fa-fw"></i> Clase<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{!!URL::to('/admin/datos/puc/clases/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
									</li>
									<li>
										<a href="{!! URL::to('/admin/datos/puc/clases ') !!}"><i class='fa fa-list-ol fa-fw'></i> Clases</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#"><span class="label label-primary">2</span><i class="fa fa-sort-amount-asc fa-fw"></i> Grupo<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{!!URL::to('/admin/datos/puc/grupos/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
									</li>
									<li>
										<a href="{!!URL::to('/admin/datos/puc/grupos')!!}"><i class='fa fa-list-ol fa-fw'></i> Grupos</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#"><span class="label label-primary">4</span><i class="fa fa-sort-amount-asc fa-fw"></i> Cuenta<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{!!URL::to('/admin/datos/puc/cuentas/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
									</li>
									<li>
										<a href="{!!URL::to('/admin/datos/puc/cuentas')!!}"><i class='fa fa-list-ol fa-fw'></i> Cuentas</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#"><span class="label label-primary">6</span><i class="fa fa-sort-amount-asc fa-fw"></i> Subcuenta<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{!!URL::to('/admin/datos/puc/subcuentas/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
									</li>
									<li>
										<a href="{!!URL::to('/admin/datos/puc/subcuentas')!!}"><i class='fa fa-list-ol fa-fw'></i> Subcuentas</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#"><span class="label label-primary">8</span><i class="fa fa-sort-amount-asc fa-fw"></i> Cuenta Auxiliar<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="{!!URL::to('/admin/datos/puc/cuentasAuxiliares/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
									</li>
									<li>
										<a href="{!!URL::to('/admin/datos/puc/cuentasAuxiliares')!!}"><i class='fa fa-list-ol fa-fw'></i> Cuentas Auxiliares</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div id="page-wrapper">
				@yield('content')
			</div>
		</div>
		{!! Html::script('assets/js/jquery.min.js') !!}
		{!! Html::script('assets/js/bootstrap.min.js') !!}
		{!!Html::script('menu1/js/metisMenu.min.js')!!}
		{!!Html::script('menu1/js/sb-admin-2.js')!!}
		
		@section('scripts')
		
		@show
	</body>
</html>