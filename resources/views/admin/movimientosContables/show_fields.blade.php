<!-- Trs Id Field -->
<div class="form-group">
    {!! Form::label('trs_id', 'Transacción:') !!}
    <p>{!! $movimientoContable->trs_id .' - '. $movimientoContable->transaccion->fecha .' - '. $movimientoContable->transaccion->tipodoc_contable->descripcion !!}</p>
</div>

<!-- Suc Id Field -->
<div class="form-group">
    {!! Form::label('suc_id', 'Sucursal:') !!}
    <p>{!! $movimientoContable->sucursal->id .' - '. $movimientoContable->sucursal->nombre !!}</p>
</div>

<!-- Cntaux Id Field -->
<div class="form-group">
    {!! Form::label('TER_ACT', 'Tercero/Activo:') !!}
    <p>
        @if( isset($movimientoContable->terceroActivo) )
            @foreach($movimientoContable->terceroActivo as $terceroActivo)
                @if( isset($terceroActivo->marca) )
                    <div>{{ $terceroActivo->marca }} - {{ $terceroActivo->modelo }}</div >
                @elseif( isset($terceroActivo->nombre) )
                    <div>{{ $terceroActivo->nombre }}</div >
                @endif
            @endforeach
        @endif
    </p>
</div>

<!-- Cntaux Id Field -->
<div class="form-group">
    {!! Form::label('cntaux_id', 'Cuenta auxiliar:') !!}
    <p>{!! $movimientoContable->pc_cuentaauxiliar->codigo .' - '. $movimientoContable->pc_cuentaauxiliar->nombre !!}</p>
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

<!-- Detalle Field -->
<div class="form-group">
    {!! Form::label('detalle', 'Detalle:') !!}
    <p>{!! $movimientoContable->detalle !!}</p>
</div>

