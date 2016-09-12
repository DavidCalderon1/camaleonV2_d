<!-- Nit Field -->
<div class="form-group">
    {!! Form::label('nit', 'Nit:') !!}
    <p>{!! $empresa->nit !!}</p>
</div>

<!-- Razon Social Field -->
<div class="form-group">
    {!! Form::label('razon_social', 'Razon Social:') !!}
    <p>{!! $empresa->razon_social !!}</p>
</div>

<!-- Naturaleza Field -->
<div class="form-group">
    {!! Form::label('naturaleza', 'Naturaleza:') !!}
    <p>{!! $empresa->naturaleza !!}</p>
</div>

<!-- Fecha Constitucion Field -->
<div class="form-group">
    {!! Form::label('fecha_constitucion', 'Fecha Constitucion:') !!}
    <p>{!! $empresa->fecha_constitucion !!}</p>
</div>

<!-- Pais Id Field -->
<div class="form-group">
    {!! Form::label('pais_id', 'Pais:') !!}
    <p>{!! $empresa->city->state->country->nombre !!}</p>
</div>

<!-- Departamento Id Field -->
<div class="form-group">
    {!! Form::label('departamento_id', 'Departamento:') !!}
    <p>{!! $empresa->city->state->nombre !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Ciudad:') !!}
    <p>{!! $empresa->city->nombre !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{!! $empresa->direccion !!}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{!! $empresa->telefono !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $empresa->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $empresa->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $empresa->deleted_at !!}</p>
</div>

