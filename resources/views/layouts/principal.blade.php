<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Camaleon: {{ isset($title_page)? $title_page : 'Mas que un software contable' }}</title>
	<meta name="description" content="Blueprint: A basic template for a responsive multi-level menu" />
	<meta name="keywords" content="blueprint, template, html, css, menu, responsive, mobile-friendly" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="{{{ '/menu_multilevel/img/logo-01.ico' }}}">
	{!! Html::style('/assets/css/bootstrap.css') !!}
		
	<!-- menu_multilevel food icons -->
	{!! Html::style('/menu_multilevel/css/organicfoodicons.css') !!}
	<!-- menu_multilevel demo styles -->
	{!! Html::style('/menu_multilevel/css/demo.css') !!}
	<!-- menu_multilevel menu styles -->
	{!! Html::style('/menu_multilevel/css/component.css') !!}
	
	<!-- general styles -->
	{!! Html::style('/general/css/styles.css') !!}
	
	<!-- menu_multilevel modernizr styles -->
	{!! Html::script('/menu_multilevel/js/modernizr-custom.js') !!}
	
	<!-- aqui se mostraran los style colocados en las vistas en la misma seccion -->
	@section('styles')
	
	@show
</head>

<body>
	<!-- Main container -->
	<div class="container">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			<div class="dummy-logo">
				<a href="/" style="cursor:auto">
					<div class="dummy-icon foodicon foodicon--coconut"></div>
				</a>
				<!--h2 class="dummy-heading">Fooganic</h2-->
			</div>
			<div class="bp-header__main">
				<span class="bp-header__present">Camaleón<span class="bp-tooltip bp-icon bp-icon--about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>
				<h1 class="bp-header__title">Software contable</h1>
				<nav class="bp-nav">
					<a class="bp-nav__item bp-icon bp-icon--prev" href="http://tympanus.net/Blueprints/PageStackNavigation/" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
					<!--a class="bp-nav__item bp-icon bp-icon--next" href="" data-info="next Blueprint"><span>Next Blueprint</span></a-->
					<a class="bp-nav__item bp-icon bp-icon--drop" href="http://tympanus.net/codrops/?p=25521" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
					<a class="bp-nav__item bp-icon bp-icon--archive" href="http://tympanus.net/codrops/category/blueprints/" data-info="Blueprints archive"><span>Go to the archive</span></a>
				</nav>
			</div>
		</header>
		<button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
		@include('forms.menu');
		<div class="content">
			@if( isset($peticion) && $peticion !== 'normal' )
				@include('flash::message')
			@endif
			<!-- <p class="info">Please choose a category</p> -->
			<!-- Ajax loaded content here -->
			@yield('content')
		</div>
		<div class="modal_loading" id="modal_loading"></div>
	</div>
	<!-- /view -->
	
	<!-- jquery & bootstrap scripts -->
	{!! Html::script('assets/js/jquery.min.js') !!}
	{!! Html::script('assets/js/bootstrap.min.js') !!}
	
	<!-- general scripts -->	
	{!! Html::script('/general/js/script_select_dynamic.js') !!}
	{!! Html::script('/general/js/script_eliminar_por_ajax.js') !!}

	<!-- menu_multilevel scripts -->
	{!! Html::script('/menu_multilevel/js/classie.js') !!}
	{!! Html::script('/menu_multilevel/js/dummydata.js') !!}
	{!! Html::script('/menu_multilevel/js/main.js') !!}
	<script>
		(function() {
			$body = $("body");
			$(document).on({
			    ajaxStart: function() { $body.addClass("loading");    },
			     ajaxStop: function() { $body.removeClass("loading"); }    
			});
		})();

		(function() {
			$('.dropdown_child').hide();
			$('.dropdown_parent > .a').click(function() {
				$(this).parent('.dropdown_parent').siblings('.dropdown_parent').find('ul').slideUp();
				$(this).parent('.dropdown_parent').find('ul').slideToggle();
			});
			var menuEl = document.getElementById('ml-menu'),
				mlmenu = new MLMenu(menuEl, {
					//breadcrumbsCtrl : true, // show breadcrumbs
					initialBreadcrumb : 'Inicio', // initial breadcrumb text
					backCtrl : true, // show back button
					itemsDelayInterval : 0, // delay between each menu item sliding animation
					onItemClick: loadDummyData // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
				});

			// mobile menu toggle
			var openMenuCtrl = document.querySelector('.action--open'),
				closeMenuCtrl = document.querySelector('.action--close');

			openMenuCtrl.addEventListener('click', openMenu);
			closeMenuCtrl.addEventListener('click', closeMenu);

			function openMenu() {
				classie.add(menuEl, 'menu--open');
			}

			function closeMenu() {
				classie.remove(menuEl, 'menu--open');
			}

			// simulate grid content loading
			var gridWrapper = document.querySelector('.content');

			function loadDummyData(ev, itemName) {
				//ev.preventDefault();

				closeMenu();
				gridWrapper.innerHTML = '';
				classie.add(gridWrapper, 'content--loading');
				setTimeout(function() {
					classie.remove(gridWrapper, 'content--loading');
					gridWrapper.innerHTML = '<ul class="products">' + dummyData[itemName] + '<ul>';
				}, 700);
			}
		})();
	</script>
	
	<!-- aqui se mostraran los scripts colocados en las vistas en la misma seccion -->
	@section('scripts')
	
	@show
	
	</body>
</html>
