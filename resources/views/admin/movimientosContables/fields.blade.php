
<!-- trs_id Field -->
<div class="form-group">
    {!! Form::label('trs_id', 'Transacción:') !!}
    {!! Form::hidden('trs_id', null, ['class' => 'form-control full', 'required' ])!!}
    {!! Form::label('trs_id', $movimientoContable->tipo_transaccion, ['class' => 'form-control full' ])!!}
</div>

<!-- Suc Id Field -->
<div class="form-group">
    {!! Form::label('suc_id', 'Sucursal:') !!}
    {!! Form::select('suc_id', $listSucursal, null, ['class' => 'form-control full', 'name' => 'suc_id', 'placeholder' => 'Seleccione una sucursal', 'required' ])!!}
</div>

<!-- Detalle Field -->
<div class="form-group">
    {!! Form::label('detalle', 'Detalle:') !!}
    {!! Form::textarea('detalle', null, ['class' => 'form-control', 'rows' => '5', 'required']) !!}
</div>

@include('admin.pc.select_dynamic')

<!-- Cntaux Id Field -->
<div class="form-group"> 
    {!! Form::label('TerceroActivo[]', 'Requerimiento:') !!}
    <br/>
    <div class="btn-group ">
        {{-- el valor de urlDestino es usado para cargar  --}}
        {!! Form::hidden('urlDestino', route('admin.transacciones.movimientosContables.lista', ['transacciones' => $movimientoContable['trs_id'] ]), ['class' => 'urlDestino']) !!}
        <label class="btn btn-default">
           {!! Form::radio('TER_ACT', 'TERCERO', false, ['required','class' => 'form-element']) !!}
           TERCERO
        </label>
        <label class="btn btn-default">
           {!! Form::radio('TER_ACT', 'ACTIVO', false) !!}
           ACTIVO FIJO
        </label>
    </div>
    {{-- valida y compara datos para evitar que despues de una validacion la opcion TER_ACT quede con un valor que no corresponda con el de la lista TerceroActivo y mostar una lista vacia en dado caso --}}
    @if( ( isset($movimientoContable->nombre_tercero) && Input::old('TER_ACT') == '' ) || ( Input::old('TER_ACT') == $movimientoContable->TER_ACT )  )
    {!! Form::select( ( $movimientoContable->id_activo_fijo != '' ? 'id_activo_fijo' : ($movimientoContable->id_tercero != '' ? 'id_tercero' : 'TerceroActivo')), (isset($listTerceroActivo) ? $listTerceroActivo : array('') ), null, ['class' => 'form-control full', 'name' => 'TerceroActivo[]', 'id' => 'TerceroActivo', 'size' => '4', 'required' ])!!}
    @else
    {!! Form::select( 'TerceroActivo', array(''), null, ['class' => 'form-control full', 'name' => 'TerceroActivo[]', 'id' => 'TerceroActivo', 'size' => '4', 'required' ])!!}
    @endif
</div>

<hr class="hr">
<!-- Debe Field -->
<div class="form-group">
    {!! Form::label('debe', 'Debe:') !!}
    {!! Form::number('debe', null, ['class' => 'form-control text-uppercase', 'required']) !!}
</div>

<!-- Haber Field -->
<div class="form-group">
    {!! Form::label('haber', 'Haber:') !!}
    {!! Form::number('haber', null, ['class' => 'form-control text-uppercase', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary enviar']) !!}
    <a href="{!! ($accion == "create") ? route('admin.transacciones.show',['id' => $movimientoContable['trs_id'] ]) : route('admin.transacciones.movimientosContables.show',['transacciones' => $movimientoContable->trs_id, 'movimientosContables' => $movimientoContable->id]) !!}" class="btn btn-default cancelar">Cancelar</a>
</div>
