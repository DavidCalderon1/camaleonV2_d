<li class="{{ Request::is('admin/usuarios*') ? 'active' : '' }}">
    <a href="{!! route('admin.usuarios.index') !!}">Usuarios</a>
</li>

<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
    <a href="{!! route('admin.roles.index') !!}">Roles</a>
</li>

<li class="{{ Request::is('admin/permisos*') ? 'active' : '' }}">
    <a href="{!! route('admin.permisos.index') !!}">Permisos</a>
</li>

