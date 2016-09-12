<table class="table table-responsive" id="transaccions-table">
    <thead>
        <th>Id</th>
        <th>Fecha</th>
        <th>Tipo de transacción</th>
        <th>Descripción</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @if(count($transacciones) == 0 )
        <tr>
            <td>No hay resultados </td>
            <td>No hay resultados </td>
            <td>No hay resultados </td>
            <td>No hay resultados </td>
            <td>No hay resultados </td>
        </tr>
    @endif
    @foreach($transacciones as $transaccion)
        <tr>
            <td>{!! $transaccion->id !!}</td>
            <td>{!! $transaccion->fecha !!}</td>
            <td>{!! $transaccion->Tipodoc_contable->descripcion !!}</td>
            <td>{!! $transaccion->descripcion !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('admin.transacciones.show', [$transaccion->id]) !!}" class='btn btn-default btn-sm' id='link_ver' title='Ver'><i class="glyphicon glyphicon-search"></i> Ver</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
