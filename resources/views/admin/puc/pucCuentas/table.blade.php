
<table class="table table-responsive ver" id="pucCuentas-table">
    <thead>
        <th>Código</th>
        <th>Nombre</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @if(count($pucCuentas) == 0 )
        <tr>
            <td>No hay resultados </td>
            <td>No hay resultados </td>
            <td>No hay resultados </td>
        </tr>
    @endif
    @foreach($pucCuentas as $pucCuenta)
        <tr>
            <td>{!! $pucCuenta->codigo !!}</td>
            <td>{!! $pucCuenta->nombre !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('admin.puc.'.$ruta.'.show', [$pucCuenta->id]) !!}" class='btn btn-default btn-sm' id='link_ver' title='Ver'><i class="glyphicon glyphicon-search"></i> Ver</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>