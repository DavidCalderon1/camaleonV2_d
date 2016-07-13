<div id="MainMenu">
	<div class="list-group panel">
		<a class="list-group-item {{ Request::is('admin*') ? 'active' : '' }}" data-toggle="collapse" href="#admin">Módulo Administrativo <i class="fa fa-caret-down"></i></a>

		    <div id="admin" class="submenu collapse {{ Request::is('admin*') ? 'in' : '' }}">
		        <a class="list-group-item {{ Request::is('admin/puc*') ? 'active' : '' }}" data-toggle="collapse" href="#puc">Manejo de Plan Único de Cuentas <i class="fa fa-caret-down"></i></a>

				    <div id="puc" class="submenu collapse {{ Request::is('admin/puc*') ? 'in' : '' }}">
				        <a class="list-group-item {{ Request::is('admin/puc/crear*') ? 'active' : '' }}" href="{!! route('admin.puc.crear') !!}"><i class='glyphicon glyphicon-plus btn-xs'></i> Creación de cuenta</a>
				        <a class="list-group-item {{ Request::is('admin/puc/buscar*') ? 'active' : '' }}" href="{!! route('admin.puc.buscar') !!}"><i class='glyphicon glyphicon-search btn-xs'></i> Busqueda de cuenta</a>

						<a class="list-group-item {{ Request::is('admin/usuarios*') ? 'active' : '' }}" href="{!! route('admin.usuarios.index') !!}">Usuarios</a>
				    </div>

				<a class="list-group-item {{ Request::is('admin/usuarios*') ? 'active' : '' }}" href="{!! route('admin.usuarios.index') !!}">Usuarios</a>
				<a class="list-group-item {{ Request::is('admin/roles*') ? 'active' : '' }}" href="{!! route('admin.roles.index') !!}">Roles</a>
				<a class="list-group-item {{ Request::is('admin/permisos*') ? 'active' : '' }}" href="{!! route('admin.permisos.index') !!}">Permisos</a>
				<a class="list-group-item {{ Request::is('admin/logs*') ? 'active' : '' }}" href="{!! route('admin.logs') !!}">Logs</a>
		    </div>
	</div>
</div>
