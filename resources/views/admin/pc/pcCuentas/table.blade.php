
<table class="table table-responsive ver" id="pcCuentas-table">
    <thead>
        <th>Código</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @if(count($pcCuentas) == 0 )
        <tr>
            <td>No hay resultados </td>
            <td>No hay resultados </td>
            <td>No hay resultados </td>
            <td>No hay resultados </td>
        </tr>
    @endif
    @foreach($pcCuentas as $pcCuenta)
        <tr>
            <td>{!! $pcCuenta->codigo !!}</td>
            <td>{!! $pcCuenta->nombre !!}</td>
            <td>{!! $pcCuenta->tipo !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('admin.pc.'.$ruta.'.show', [$pcCuenta->id]) !!}" class='btn btn-default btn-sm' id='link_ver' title='Ver'><i class="glyphicon glyphicon-search"></i> Ver</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>