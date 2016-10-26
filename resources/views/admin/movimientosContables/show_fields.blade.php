<!-- Suc Id Field -->
<div class="form-group">
    {!! Form::label('suc_id', 'Sucursal:') !!}
    <p>{!! $movimientoContable->id_sucursal .' - '. $movimientoContable->nombre_sucursal !!}</p>
</div>

<!-- Detalle Field -->
<div class="form-group">
    {!! Form::label('detalle', 'Detalle:') !!}
    <p>{!! $movimientoContable->detalle !!}</p>
</div>

<!-- Cntaux Id Field -->
<div class="form-group">
    {!! Form::label('cntaux_id', 'Cuenta auxiliar:') !!}
    <p>{!! $movimientoContable->codigo_cntaux .' - '. $movimientoContable->nombre_cntaux !!}</p>
</div>

<!-- Tercero/Activo Field -->
<div class="form-group">
    {!! Form::label('TER_ACT', 'Tercero/Activo:') !!}
    <p>
        @if( $movimientoContable->id_tercero != null )
            <div>{{ $movimientoContable->id_tercero }} - {{ $movimientoContable->numero_tercero }} - {{ $movimientoContable->nombre_tercero }}</div >
        @elseif( $movimientoContable->id_activo_fijo != null )
            <div>{{ $movimientoContable->id_activo_fijo }} - {{ $movimientoContable->marca_activo_fijo }} - {{ $movimientoContable->modelo_activo_fijo }}</div >
        @endif
    </p>
</div>

<!-- Debe Field -->
<div class="form-group">
    {!! Form::label('debe', 'Debe:') !!}
    <p class="moneda">{!! $movimientoContable->debe !!}</p>
</div>

<!-- Haber Field -->
<div class="form-group">
    {!! Form::label('haber', 'Haber:') !!}
    <p class="moneda">{!! $movimientoContable->haber !!}</p>
</div>

