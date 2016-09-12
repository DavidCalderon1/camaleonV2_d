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
		        <a class="list-group-item {{ Request::is('admin/transacciones*') ? 'active' : '' }}" data-toggle="collapse" href="#transacciones">Transacciónes <i class="fa fa-caret-down"></i></a>

				    <div id="transacciones" class="submenu collapse {{ Request::is('admin/transaccion*') ? 'in' : '' }}">
				        <a class="list-group-item {{ Request::is('admin/transaccion/crear*') ? 'active' : '' }}" href="{!! route('admin.transaccion.crear') !!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Creación de transacción</a>
				        <a class="list-group-item {{ Request::is('admin/transaccion/buscar*') ? 'active' : '' }}" href="{!! route('admin.transaccion.buscar') !!}"><i class='glyphicon glyphicon-search btn-xs'></i> Busqueda de transacción</a>
				    </div>

		    	<!-- Modulo Activos fijos -->
				<a class="list-group-item {{ Request::is('admin/activosFijos*') ? 'active' : '' }}" href="{!! route('admin.activosFijos.index') !!}">Activos Fijos</a>

		    	<!-- Modulos usuarios, roles, permisos y logs -->
				<a class="list-group-item {{ Request::is('admin/usuarios*') ? 'active' : '' }}" href="{!! route('admin.usuarios.index') !!}">Usuarios</a>
				<a class="list-group-item {{ Request::is('admin/roles*') ? 'active' : '' }}" href="{!! route('admin.roles.index') !!}">Roles</a>
				<a class="list-group-item {{ Request::is('admin/permisos*') ? 'active' : '' }}" href="{!! route('admin.permisos.index') !!}">Permisos</a>
				<a class="list-group-item {{ Request::is('admin/logs*') ? 'active' : '' }}" href="{!! route('admin.logs') !!}">Logs</a>
		    </div>
	</div>
</div>

