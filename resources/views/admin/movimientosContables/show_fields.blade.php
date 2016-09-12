<!-- Trs Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trs_id', 'Transacción:') !!}
    <p>{!! $movimientoContable->trs_id .' - '. $movimientoContable->transaccion->fecha .' - '. $movimientoContable->transaccion->tipodoc_contable->descripcion !!}</p>
</div>

<!-- Suc Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('suc_id', 'Sucursal:') !!}
    <p>{!! $movimientoContable->sucursal->id .' - '. $movimientoContable->sucursal->nombre !!}</p>
</div>

<!-- Cntaux Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TER_ACT', 'Tercero/Activo:') !!}
    <p>
        @foreach($movimientoContable->terceroActivo as $terceroActivo)
            @if( isset($terceroActivo->marca) )
                <div class="comillas">{{ $terceroActivo->marca }} - {{ $terceroActivo->modelo }}</div >
            @elseif( isset($terceroActivo->nombre) )
                <div class="comillas">{{ $terceroActivo->nombre }}</div >
            @endif
        @endforeach
    </p>
</div>

<!-- Cntaux Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntaux_id', 'Cuenta auxiliar:') !!}
    <p>{!! $movimientoContable->pc_cuentaauxiliar->codigo .' - '. $movimientoContable->pc_cuentaauxiliar->nombre !!}</p>
</div>

<!-- Debe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debe', 'Debe:') !!}
    <p>{!! $movimientoContable->debe !!}</p>
</div>

<!-- Haber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('haber', 'Haber:') !!}
    <p>{!! $movimientoContable->haber !!}</p>
</div>

<!-- Detalle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('detalle', 'Detalle:') !!}
    <p>{!! $movimientoContable->detalle !!}</p>
</div>

