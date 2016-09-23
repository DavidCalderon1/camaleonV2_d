<nav class="container col-xs-12">

    <div id="route"></div>
{{-- MENU PRINCIPAL --}}
    <ul class="nav" id="menuPrincipal" data-name="PRINCIPAL">
        <li class="link"><a href="/">Home</a></li>
        <li class="linkmenu" data-menu="menuModuloAdministrativo">Módulo Administrativo</li>
    </ul>
    
{{-- MENU SUBNIVEL 1 --}}
    <ul class="nav" id="menuModuloAdministrativo" data-name="MODULO ADMINISTRATIVO">
        <li class="linkmenu" data-menu="menuPC">Manejo de Plan de Cuentas</li>
        <li class="linkmenu" data-menu="menuTransacciones">Transacciones</li>
        <li class="link"><a href="{!! route('admin.activosFijos.index') !!}">Activos Fijos</a></li>
        <li class="link"><a href="{!! route('admin.usuarios.index') !!}">Usuarios</a></li>
        <li class="link"><a href="{!! route('admin.roles.index') !!}">Roles</a></li>
        <li class="link"><a href="{!! route('admin.permisos.index') !!}">Permisos</a></li>
        <li class="link"><a href="{!! route('admin.logs') !!}">Logs</a></li>
        <li class="linkmenu" data-menu="menuLocalizacion">Localización</li>
        <li class="link"><a href="{!! route('terceros.index') !!}">Terceros</a></li>
        <li class="link"><a href="{!! route('sucursales.index') !!}">Sucursales</a></li>
        <li class="link"><a href="{!! route('materiaPrima.index') !!}">Materia Prima</a></li>
    </ul>
    
{{-- MENU SUBNIVEL 2 --}}
    <ul class="nav" id="menuPC" data-name="PLAN DE CUENTAS">
        <li class="link"><a href="{!! route('admin.pc.crear') !!}">Crear</a></li>
        <li class="link"><a href="{!! route('admin.pc.buscar') !!}">Buscar</a></li>
    </ul>
    <ul class="nav" id="menuTransacciones" data-name="TRANSACCIONES">
        <li class="link"><a href="{!! route('admin.transacciones.crear') !!}">Crear</a></li>
        <li class="link"><a href="{!! route('admin.transacciones.buscar') !!}">Buscar</a></li>
    </ul>
    <ul class="nav" id="menuLocalizacion" data-name="LOCALIZACION">
        <li class="link"><a href="{!! route('countries.index') !!}">Países</a></li>
        <li class="link"><a href="{!! route('states.index') !!}">Departamentos</a></li>
        <li class="link"><a href="{!! route('cities.index') !!}">Ciudades</a></li>
    </ul>

</nav>

<script type="text/javascript">

    $(document).ready(function(){
        
        $('#menuPrincipal').slideDown();
        $('nav').find('#route').append('<span class="linkmenu" data-menu="menuPrincipal">PRINCIPAL</span>');

    });

</script>