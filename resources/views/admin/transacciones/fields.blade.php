<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control text-uppercase', 'required']) !!}
</div>

<!-- Tdc Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tdc_id', 'Tipo de transacción:') !!}
    {!! Form::select('tdc_id', $listTipoDocC, null, ['class' => 'form-control full', 'name' => 'tdc_id', 'placeholder' => 'Seleccione un tipo', 'required' ])!!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'required', 'rows' => '5']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary enviar']) !!}
    <a href="{{ URL::previous() }}" class="btn btn-default cancelar">Cancelar</a>
</div>