@if( $peticion == "normal" || $peticion == "busqueda" )
    @include('admin.movimientosContables.filter')
    <div class="clearfix"></div>
    <table class="table table-responsive results" id="movimientoContables-table">
@endif
        <thead>
            <th>Sucursal</th>
            <th>Detalle</th>
            <th>Cuenta auxiliar</th>
            <th>Tercero</th>
            <th>Activo</th>
            <th>Debe</th>
            <th>Haber</th>
            <th colspan="3">Acción</th>
        </thead>
        <tbody>
        @if(count($movimientoContables) == 0 )
            <tr>
                <td>No hay resultados </td>
                <td>No hay resultados </td>
                <td>No hay resultados </td>
                <td>No hay resultados </td>
                <td>No hay resultados </td>
                <td>No hay resultados </td>
                <td>No hay resultados </td>
            </tr>
        @endif
        {{-- dd($movimientoContables) --}}
        @foreach($movimientoContables as $movimientoContable)
            <tr>
                <td>{!! $movimientoContable->id_sucursal .' - '. $movimientoContable->nombre_sucursal !!}</td>
                <td>{!! $movimientoContable->detalle !!}</td>
    			
                <td>{!! $movimientoContable->codigo_cntaux .' - '. $movimientoContable->nombre_cntaux !!}</td>

    		{{-- valida si existen registros en la relacion con la tabla tercero y activo_fijo --}}
    		{{-- si es asi entonces recorre las variables y muestra los registros, si no entonces muestra dos guiones '--' --}}
    		@if( isset($movimientoContable->id_tercero) && $movimientoContable->id_tercero != null )
    			<td>{{ $movimientoContable->numero_tercero }} - {{ $movimientoContable->nombre_tercero }}</td>
    		@else
    			<td>--</td>
    		@endif
    		@if( isset($movimientoContable->id_activo_fijo) && $movimientoContable->id_activo_fijo != null )
    			<td>{{ $movimientoContable->id_activo_fijo }} - {{ $movimientoContable->marca_activo_fijo }} - {{ $movimientoContable->modelo_activo_fijo }}</td>
    		@else
    			<td>--</td>
    		@endif
    		
    			<td class="moneda">{!! $movimientoContable->debe !!}</td>
    			<td class="moneda">{!! $movimientoContable->haber !!}</td>
                
                <td>
                    <div class='btn-group'>
                        <a href="{!! route('admin.transacciones.movimientosContables.show', ['transacciones' => $transaccion, 'movimientosContables' => $movimientoContable->id]) !!}" class='btn btn-default btn-sm' id='link_ver' title='Ver'><i class="glyphicon glyphicon-search"></i> Ver</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
@if( $peticion == "normal" || $peticion == "busqueda" )
    </table>

    @section('scripts')
        {!! Html::script('/assets/js/script_buscar_crear_transaccion_load.js') !!}
    @endsection
@endif

