<div id="MainMenu">
	<div class="list-group panel">
		<a class="list-group-item {{ Request::is('admin*') ? 'active' : '' }}" data-toggle="collapse" href="#admin">Módulo Administrativo <i class="fa fa-caret-down"></i></a>

		    <div id="admin" class="submenu collapse {{ Request::is('admin*') ? 'in' : '' }}">
		    	<!-- Modulo PDC -->
		        <a class="list-group-item {{ Request::is('admin/pc*') ? 'active' : '' }}" data-toggle="collapse" href="#pc">Manejo de Plan de Cuentas <i class="fa fa-caret-down"></i></a>

				    <div id="pc" class="submenu collapse {{ Request::is('admin/pc*') ? 'in' : '' }}">
				        <a class="list-group-item {{ Request::is('admin/pc/crear*') ? 'active' : '' }}" href="{!! route('admin.pc.crear') !!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Creación de cuenta</a>
				        <a class="list-group-item {{ Request::is('admin/pc/buscar*') ? 'active' : '' }}" href="{!! route('admin.pc.buscar') !!}"><i class='glyphicon glyphicon-search btn-xs'></i> Busqueda de cuenta</a>
				    </div>

		    	<!-- Modulo Transaccion -->
		        <a class="list-group-item {{ Request::is('admin/transacciones*') ? 'active' : ( Request::is('admin/movimientosContables*') ? 'active' : '' ) }}" data-toggle="collapse" href="#transacciones">Transacciónes <i class="fa fa-caret-down"></i></a>

				    <div id="transacciones" class="submenu collapse {{ Request::is('admin/transaccion*') ? 'in' : ( Request::is('admin/movimientosContables*') ? 'in' : '' ) }}">
				        <a class="list-group-item {{ Request::is('admin/transaccion/crear*') ? 'active' : '' }}" href="{!! route('admin.transaccion.crear') !!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Creación de transacción</a>
				        <a class="list-group-item {{ Request::is('admin/transaccion/buscar*') ? 'active' : '' }}" href="{!! route('admin.transaccion.buscar') !!}"><i class='glyphicon glyphicon-search btn-xs'></i> Busqueda de transacción</a>

						<!-- Modulo movimiento contable -->
						<a class="list-group-item {{ Request::is('admin/movimientosContables') ? 'active' : '' }}" href="{!! route('admin.movimientosContables.index') !!}"><i class='glyphicon glyphicon-align-left btn-xs'></i> Movimientos Contables</a>
				    </div>

		    	<!-- Modulo Activos fijos -->
				<a class="list-group-item {{ Request::is('admin/activosFijos*') ? 'active' : '' }}" href="{!! route('admin.activosFijos.index') !!}"><i class='glyphicon glyphicon-align-left btn-xs'></i> Activos Fijos</a>

		    	<!-- Modulos usuarios, roles, permisos y logs -->
				<a class="list-group-item {{ Request::is('admin/usuarios*') ? 'active' : '' }}" href="{!! route('admin.usuarios.index') !!}"><i class='glyphicon glyphicon-align-left btn-xs'></i> Usuarios</a>
				<a class="list-group-item {{ Request::is('admin/roles*') ? 'active' : '' }}" href="{!! route('admin.roles.index') !!}"><i class='glyphicon glyphicon-align-left btn-xs'></i> Roles</a>
				<a class="list-group-item {{ Request::is('admin/permisos*') ? 'active' : '' }}" href="{!! route('admin.permisos.index') !!}"><i class='glyphicon glyphicon-align-left btn-xs'></i> Permisos</a>
				<a class="list-group-item {{ Request::is('admin/logs*') ? 'active' : '' }}" href="{!! route('admin.logs') !!}">Logs</a>


				<a class="list-group-item {{ Request::is('countries*') ? 'active' : (Request::is('states*') ? 'active' : (Request::is('cities*') ? 'active' : '') ) }}" data-toggle="collapse" href="#localizacion">Módulo de Localización <i class="fa fa-caret-down"></i></a>

				    <div id="localizacion" class="submenu collapse {{ Request::is('countries*') ? 'in' : (Request::is('states*') ? 'in' : (Request::is('cities*') ? 'in' : '') ) }}">
				    	<!-- Modulo localizacion -->
				        <a class="list-group-item {{ Request::is('countries') ? 'active' : '' }}" href="{!! route('countries.index') !!}"><i class='glyphicon glyphicon-align-left btn-xs'></i> Paises</a>
				        <a class="list-group-item {{ Request::is('states') ? 'active' : '' }}" href="{!! route('states.index') !!}"><i class='glyphicon glyphicon-align-left btn-xs'></i> Departamentos</a>
				        <a class="list-group-item {{ Request::is('cities') ? 'active' : '' }}" href="{!! route('cities.index') !!}"><i class='glyphicon glyphicon-align-left btn-xs'></i> Ciudades</a>
				        
					</div>

		        <a class="list-group-item {{ Request::is('terceros*') ? 'active' : '' }}" href="{!! route('terceros.index') !!}"><i class='glyphicon glyphicon-align-left btn-xs'></i> Terceros</a>

		        <a class="list-group-item {{ Request::is('sucursales*') ? 'active' : '' }}" href="{!! route('sucursales.index') !!}"><i class='glyphicon glyphicon-align-left btn-xs'></i> Sucursales</a>

		        <a class="list-group-item {{ Request::is('materiaPrima*') ? 'active' : '' }}" data-toggle="collapse" href="#materiaPrima" ><i class='glyphicon glyphicon-align-left btn-xs'></i> Materia Prima</a>
		</div>
	</div>
</div>

