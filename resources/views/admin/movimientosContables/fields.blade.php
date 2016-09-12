
<!-- trs_id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trs_id', 'Transacción:') !!}
    {!! Form::select('trs_id', $listTransaccion, null, ['class' => 'form-control full', 'name' => 'trs_id', 'placeholder' => 'Seleccione una transacción', 'required' ])!!}
</div>

<!-- Suc Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('suc_id', 'Sucursal:') !!}
    {!! Form::select('suc_id', $listSucursal, null, ['class' => 'form-control full', 'name' => 'suc_id', 'placeholder' => 'Seleccione una sucursal', 'required' ])!!}
</div>

<!-- Cntaux Id Field -->
<div class="form-group col-sm-6"> 
    {!! Form::label('Terceros[]', 'Requerimiento:') !!}<i> (ctrl + click)</i>
    <br/>
    <div class="btn-group ">
        <label class="btn btn-default">
           {!! Form::radio('TER_ACT', 'TERCERO', false, ['required','class' => 'form-element']) !!}
           TERCERO
        </label>
        <label class="btn btn-default">
           {!! Form::radio('TER_ACT', 'ACTIVO', false) !!}
           ACTIVO FIJO
        </label>
    </div>



    <select class="form-control full" id="TerceroActivo" name="TerceroActivo[]" multiple="multiple" required disabled>
        @if($listTerceroActivo != '')
            @foreach($listTerceroActivo as $id => $title)
                {{ $selected = '' }}
                @if( count($movimientoContable->tercero) > 0 )
                    @foreach($movimientoContable->tercero as $tercero)
                        @if($id == $tercero->id)
                            {{ $selected = 'selected' }}
                        @endif
                    @endforeach
                @elseif( count($movimientoContable->activo_fijo) > 0 )
                    @foreach($movimientoContable->activo_fijo as $activo_fijo)
                        @if($id == $activo_fijo->id)
                            {{ $selected = 'selected' }}
                        @endif
                    @endforeach
                @endif
                <option value="{{$id}}" {{ $selected }} >{{$title}}</option>
            @endforeach
        @endif
    </select>
</div>

@include('admin.pc.select_dynamic')

<hr class="hr">
<!-- Debe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debe', 'Debe:') !!}
    {!! Form::number('debe', null, ['class' => 'form-control text-uppercase', 'required']) !!}
</div>

<!-- Haber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('haber', 'Haber:') !!}
    {!! Form::number('haber', null, ['class' => 'form-control text-uppercase', 'required']) !!}
</div>

<!-- Detalle Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('detalle', 'Detalle:') !!}
    {!! Form::textarea('detalle', null, ['class' => 'form-control', 'rows' => '5', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary enviar']) !!}
    <a href="{{ URL::previous() }}" class="btn btn-default cancelar">Cancelar</a>
</div>
