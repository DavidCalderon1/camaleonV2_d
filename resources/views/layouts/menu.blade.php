<nav class="container col-xs-12">

    <div id="route"></div>
{{-- MENU PRINCIPAL --}}
    <ul class="nav" id="menuPrincipal" data-name="PRINCIPAL">
        <li class="link"><a href="/">Inicio</a></li>
        <li class="linkmenu" data-menu="menuModuloAdministrativo">Módulo Administrativo</li>
        <li class="linkmenu" data-menu="menuModuloParametrizacion">Módulo de Parametrización</li>
        <li class="linkmenu" data-menu="menuModuloProduccion">Cadena de Producción</li>
    </ul>
    
{{-- MENU SUBNIVEL 1 --}}
    <ul class="nav" id="menuModuloAdministrativo" data-name="MODULO ADMINISTRATIVO">
        <li class="linkmenu" data-menu="menuPC">Plan de Cuentas</li>
        <li class="link"><a href="{!! route('admin.usuarios.index') !!}">Usuarios</a></li>
        <li class="link"><a href="{!! route('admin.roles.index') !!}">Roles</a></li>
        <li class="link"><a href="{!! route('admin.permisos.index') !!}">Permisos</a></li>
        <li class="link"><a href="{!! route('admin.logs') !!}">Logs</a></li>
    </ul>
    
    <ul class="nav" id="menuModuloParametrizacion" data-name="MODULO DE PARAMETRIZACIÓN">
        <li class="linkmenu" data-menu="menuLocalizacion">Localización</li>
        <li class="link"><a href="{!! route('terceros.index') !!}">Terceros</a></li>
        <li class="link"><a href="{!! route('sucursales.index') !!}">Sucursales</a></li>
        <li class="link"><a href="{!! route('materiaPrima.index') !!}">Materia Prima</a></li>
    </ul>

    <ul class="nav" id="menuModuloProduccion" data-name="CADENA DE PRODUCCIÓN">
        <li class="linkmenu" data-menu="menuPreproduccion">Preproducción</li>
        <li class="linkmenu" data-menu="menuProduccion">Producción</li>
        <li class="linkmenu" data-menu="menuPosproduccion">Posproducción</li>
    </ul>

{{-- MENU SUBNIVEL 2 --}}

    <ul class="nav" id="menuPC" data-name="PLAN DE CUENTAS">
        <li class="link"><a href="{!! route('admin.pc.crear') !!}">Crear</a></li>
        <li class="link"><a href="{!! route('admin.pc.buscar') !!}">Buscar</a></li>
    <!--
        <li class="linkmenu" data-menu="menuTransacciones">Transacciones</li>
        <li class="link"><a href="{ !! route('admin.activosFijos.index') !!}">Activos Fijos</li>
    -->
    </ul>

    <ul class="nav" id="menuLocalizacion" data-name="LOCALIZACIÓN">
        <li class="link"><a href="{!! route('countries.index') !!}">Países</a></li>
        <li class="link"><a href="{!! route('states.index') !!}">Departamentos</a></li>
        <li class="link"><a href="{!! route('cities.index') !!}">Ciudades</a></li>
    </ul>

    <ul class="nav" id="menuPreproduccion" data-name="PREPRODUCCIÓN">
        
    </ul>

    <ul class="nav" id="menuProduccion" data-name="PRODUCCIÓN">
        
    </ul>

    <ul class="nav" id="menuPosproduccion" data-name="POSPRODUCCIÓN">
        
    </ul>

</nav>

{{-- MENU SUBNIVEL 3 --}}

    <!--
    <ul class="nav" id="menuTransacciones" data-name="TRANSACCIONES">
        <li class="link"><a href="{ !! route('admin.transacciones.crear') !!}">Crear</a></li>
        <li class="link"><a href="{ !! route('admin.transacciones.buscar') !!}">Buscar</a></li>
    </ul>
    -->

<script type="text/javascript">
    $(document).ready(function(){
        
        $('#menuPrincipal').slideDown();
        $('nav').find('#route').append('<span class="linkmenu" data-menu="menuPrincipal">PRINCIPAL</span>');
    });
</script>