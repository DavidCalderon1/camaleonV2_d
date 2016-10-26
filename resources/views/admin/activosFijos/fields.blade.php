

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>


<!-- Marca Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca', 'Marca:') !!}
    {!! Form::text('marca', null, ['class' => 'form-control']) !!}
</div>

<!-- Modelo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modelo', 'Modelo:') !!}
    {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Adquisicion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_adquisicion', 'Fecha Adquisicion:') !!}
    {!! Form::text('fecha_adquisicion', null, ['class' => 'datepicker form-control']) !!}
</div>

<!-- Valor Compra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_compra', 'Valor Compra:') !!}
    {!! Form::number('valor_compra', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.activosFijos.index') !!}" class="btn btn-default">Cancel</a>
</div>
