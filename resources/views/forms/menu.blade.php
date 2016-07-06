<nav id="ml-menu" class="menu">
	<button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
	<div class="menu__wrap">
		<ul data-menu="main" class="menu__level">
			<li class="menu__item"><a class="menu__link" data-submenu="submenu-1" href="{!!URL::to('/admin')!!}">Módulo Administrativo</a></li>
			<li class="menu__item"><a class="menu__link" data-submenu="submenu-2" href="#">Fruits</a></li>
			<li class="menu__item"><a class="menu__link" data-submenu="submenu-3" href="#">Grains</a></li>
			<li class="menu__item"><a class="menu__link" data-submenu="submenu-4" href="#">Mylk &amp; Drinks</a></li>
			<!--li class="menu__item"><a class="menu__link" data-submenu="submenu-5" href="#">Mylk &amp; Grains 5</a></li-->
			<li class="menu__item"><a class="menu__link" data-submenu="submenu-1-1" href="#">Mylk &amp; Grains 5</a></li>
		</ul>
		<!-- Submenu 1 -->
		<ul data-menu="submenu-1" class="menu__level">
			<li class="menu__item"><a class="menu__link" data-submenu="submenu-1-1" href="{!!URL::to('/admin/puc')!!}">Manejo de Plan Único de Cuentas</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Roots &amp; Seeds</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Cabbages</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Salad Greens</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Mushrooms</a></li>
			<li class="menu__item"><a class="menu__link" data-submenu="submenu-1-6" href="#">Sale %</a></li>
		</ul>
		<!-------------------------------------------------->
		<!-------------------------------------------------->
		<!-- Submenu 1-1 -->
		<ul data-menu="submenu-1-1" class="menu__level" >
			<li class="menu__item"><a class="menu__link" href={!!URL::to('/admin/puc/crear')!!}><i class='glyphicon glyphicon-plus btn-xs'></i> Creación de cuenta</a></li>
			<li class="menu__item"><a class="menu__link" href={!!URL::to('/admin/puc/buscar')!!}><i class='glyphicon glyphicon-search btn-xs'></i> Busqueda de cuenta</a></li>
			<li class="menu__item menu__item_dropdown dropdown_parent">
				<div class="menu__link_dropdown a">
					<i class="glyphicon glyphicon-sort-by-attributes btn-xs"><span class="btn-xs">1</span></i>Clase<span class="btn-xs pull-right"><span class="caret "></span></span>
				</div>
				<ul class="dropdown_child">
					<li class="menu__item_dropdown">
						<a class="menu__link" href="{!!URL::to('/admin/puc/clases/create')!!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Agregar</a>
					</li>
					<li class="menu__item_dropdown">
						<a class="menu__link" href="{!! URL::to('/admin/puc/clases ') !!}"><i class='glyphicon glyphicon-list btn-xs'></i> Clases</a>
					</li>
				</ul>
			</li>
			<li class="menu__item menu__item_dropdown dropdown_parent">
				<div class="menu__link_dropdown a">
					<i class="glyphicon glyphicon-sort-by-attributes btn-xs"><span class="btn-xs">2</span></i>Grupo<span class="btn-xs pull-right"><span class="caret "></span></span>
				</div>
				<ul class="dropdown_child">
					<li class="menu__item_dropdown">
						<a class="menu__link" href="{!!URL::to('/admin/puc/grupos/create')!!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Agregar</a>
					</li>
					<li class="menu__item_dropdown">
						<a class="menu__link" href="{!! URL::to('/admin/puc/grupos ') !!}"><i class='glyphicon glyphicon-list btn-xs'></i> Grupos</a>
					</li>
				</ul>
			</li>
			<li class="menu__item menu__item_dropdown dropdown_parent">
				<div class="menu__link_dropdown a">
					<i class="glyphicon glyphicon-sort-by-attributes btn-xs"><span class="btn-xs">4</span></i>Cuenta<span class="btn-xs pull-right"><span class="caret "></span></span>
				</div>
				<ul class="dropdown_child">
					<li class="menu__item_dropdown">
						<a class="menu__link" href="{!!URL::to('/admin/puc/cuentas/create')!!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Agregar</a>
					</li>
					<li class="menu__item_dropdown">
						<a class="menu__link" href="{!! URL::to('/admin/puc/cuentas ') !!}"><i class='glyphicon glyphicon-list btn-xs'></i> Cuentas</a>
					</li>
				</ul>
			</li>
			<li class="menu__item menu__item_dropdown dropdown_parent">
				<div class="menu__link_dropdown a">
					<i class="glyphicon glyphicon-sort-by-attributes btn-xs"><span class="btn-xs">6</span></i>Subcuenta<span class="btn-xs pull-right"><span class="caret "></span></span>
				</div>
				<ul class="dropdown_child">
					<li class="menu__item_dropdown">
						<a class="menu__link" href="{!!URL::to('/admin/puc/subcuentas/create')!!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Agregar</a>
					</li>
					<li class="menu__item_dropdown">
						<a class="menu__link" href="{!! URL::to('/admin/puc/subcuentas ') !!}"><i class='glyphicon glyphicon-list btn-xs'></i> Subcuentas</a>
					</li>
				</ul>
			</li>
			<li class="menu__item menu__item_dropdown dropdown_parent">
				<div class="menu__link_dropdown a">
					<i class="glyphicon glyphicon-sort-by-attributes btn-xs"><span class="btn-xs">10</span></i>Cuenta Auxiliar<span class="btn-xs pull-right"><span class="caret "></span></span>
				</div>
				<ul class="dropdown_child">
					<li class="menu__item_dropdown">
						<a class="menu__link" href="{!!URL::to('/admin/puc/cuentasauxiliares/create')!!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Agregar</a>
					</li>
					<li class="menu__item_dropdown">
						<a class="menu__link" href="{!! URL::to('/admin/puc/cuentasauxiliares') !!}"><i class='glyphicon glyphicon-list btn-xs'></i> Cuentas Auxiliares</a>
					</li>
				</ul>
			</li>
		</ul>
		<!-------------------------------------------------->
		<!-------------------------------------------------->
		
		<!-- Submenu 1-6 -->
		<ul data-menu="submenu-1-6" class="menu__level">
			<li class="menu__item"><a class="menu__link" href="#">Fair Trade Roots</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Dried Veggies</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Our Brand</a></li>
			<li class="menu__item"><a class="menu__link" data-submenu="submenu-1-6-4" href="#">Homemade</a></li>
		</ul>
		<!-- Submenu 1-6-4 -->
		<ul data-menu="submenu-1-6-4" class="menu__level">
			<li class="menu__item"><a class="menu__link" href="#">Fair Trade Roots</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Dried Veggies</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Our Brand</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Homemade</a></li>
		</ul>
		<!-- Submenu 2 -->
		<ul data-menu="submenu-2" class="menu__level">
			<li class="menu__item"><a class="menu__link" href="#">Citrus Fruits</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Berries</a></li>
			<li class="menu__item"><a class="menu__link" data-submenu="submenu-2-1" href="#">Special Selection</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Tropical Fruits</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Melons</a></li>
		</ul>
		<!-- Submenu 2-1 -->
		<ul data-menu="submenu-2-1" class="menu__level">
			<li class="menu__item"><a class="menu__link" href="#">Exotic Mixes</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Wild Pick</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Vitamin Boosters</a></li>
		</ul>
		<!-- Submenu 3 -->
		<ul data-menu="submenu-3" class="menu__level">
			<li class="menu__item"><a class="menu__link" href="#">Buckwheat</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Millet</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Quinoa</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Wild Rice</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Durum Wheat</a></li>
			<li class="menu__item"><a class="menu__link" data-submenu="submenu-3-1" href="#">Promo Packs</a></li>
		</ul>
		<!-- Submenu 3-1 -->
		<ul data-menu="submenu-3-1" class="menu__level">
			<li class="menu__item"><a class="menu__link" href="#">Starter Kit</a></li>
			<li class="menu__item"><a class="menu__link" href="#">The Essential 8</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Bolivian Secrets</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Flour Packs</a></li>
		</ul>
		<!-- Submenu 4 -->
		<ul data-menu="submenu-4" class="menu__level">
			<li class="menu__item"><a class="menu__link" href="#">Grain Mylks</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Seed Mylks</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Nut Mylks</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Nutri Drinks</a></li>
			<li class="menu__item"><a class="menu__link" data-submenu="submenu-4-1" href="#">Selection</a></li>
		</ul>
		<!-- Submenu 4-1 -->
		<ul data-menu="submenu-4-1" class="menu__level">
			<li class="menu__item"><a class="menu__link" href="#">Nut Mylk Packs</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Amino Acid Heaven</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Allergy Free</a></li>
		</ul>
		<!-- Submenu 5 -->
		<ul data-menu="submenu-5" class="menu__level">
			<li class="menu__item"><a class="menu__link" href="#">Grain Mylks</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Seed Mylks</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Nut Mylks</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Nutri Drinks</a></li>
			<li class="menu__item"><a class="menu__link" data-submenu="submenu-4-1" href="#">Selection</a></li>
		</ul>
		<!-- Submenu 5-1 -->
		<ul data-menu="submenu-5-1" class="menu__level">
			<li class="menu__item"><a class="menu__link" href="#">Nut Mylk Packs</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Amino Acid Heaven</a></li>
			<li class="menu__item"><a class="menu__link" href="#">Allergy Free</a></li>
		</ul>
		
	</div>
</nav>