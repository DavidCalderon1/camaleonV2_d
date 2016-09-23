<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $activoFijo->id !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $activoFijo->descripcion !!}</p>
</div>

<!-- Marca Field -->
<div class="form-group">
    {!! Form::label('marca', 'Marca:') !!}
    <p>{!! $activoFijo->marca !!}</p>
</div>

<!-- Modelo Field -->
<div class="form-group">
    {!! Form::label('modelo', 'Modelo:') !!}
    <p>{!! $activoFijo->modelo !!}</p>
</div>

<!-- Fecha Adquisicion Field -->
<div class="form-group">
    {!! Form::label('fecha_adquisicion', 'Fecha Adquisicion:') !!}
    <p>{!! $activoFijo->fecha_adquisicion !!}</p>
</div>

<!-- Valor Compra Field -->
<div class="form-group">
    {!! Form::label('valor_compra', 'Valor Compra:') !!}
    <p class="moneda">{!! $activoFijo->valor_compra !!}</p>
</div>

<!-- Cantidad Field -->
<div class="form-group">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    <p>{!! $activoFijo->cantidad !!}</p>
</div>
