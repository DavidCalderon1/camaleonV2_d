<table class="table table-responsive" id="movimientoContables-table">
    <thead>
    @if(isset($transaccion) )
        <th>Sucursal</th>
        <th>Cuenta auxiliar</th>
    @else
        <th>Transacción</th>
        <th>Sucursal</th>
    @endif
        <th>Detalle</th>
        <th colspan="3">Acción</th>
    </thead>
    <tbody>
    @if(count($movimientoContables) == 0 )
        <tr>
            <td>No hay resultados </td>
            <td>No hay resultados </td>
            <td>No hay resultados </td>
        </tr>
    @endif
    @foreach($movimientoContables as $movimientoContable)
        <tr>
        @if(isset($transaccion) )
            <td>{!! $movimientoContable->sucursal->id .' - '. $movimientoContable->sucursal->nombre !!}</td>
            <td>{!! $movimientoContable->pc_cuentaauxiliar->codigo .' - '. $movimientoContable->pc_cuentaauxiliar->nombre !!}</td>
        @else
            <td>{!! $movimientoContable->trs_id !!}</td>
            <td>{!! $movimientoContable->sucursal->id .' - '. $movimientoContable->sucursal->nombre !!}</td>
        @endif
            <td>{!! $movimientoContable->detalle !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('admin.transacciones.movimientosContables.show', ['transacciones' => $transaccion, 'movimientosContables' => $movimientoContable->id]) !!}" class='btn btn-default btn-sm' id='link_ver' title='Ver'><i class="glyphicon glyphicon-search"></i> Ver</a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
