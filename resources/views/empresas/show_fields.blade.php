<!-- Nit Field -->
<div class="field field_a">
    {!! Form::label('nit', 'Nit:') !!}
    <p>{!! $empresa->nit !!}</p>
</div>

<!-- Razon Social Field -->
<div class="field field_a">
    {!! Form::label('razon_social', 'Razon Social:') !!}
    <p>{!! $empresa->razon_social !!}</p>
</div>

<!-- Naturaleza Field -->
<div class="field field_a">
    {!! Form::label('naturaleza', 'Naturaleza:') !!}
    <p>{!! $empresa->naturaleza !!}</p>
</div>

<!-- Fecha Constitucion Field -->
<div class="field field_a">
    {!! Form::label('fecha_constitucion', 'Fecha Constitucion:') !!}
    <p>{!! $empresa->fecha_constitucion !!}</p>
</div>

<!-- Pais Id Field -->
<div class="field field_b">
    {!! Form::label('pais_id', 'Pais:') !!}
    <p>{!! $empresa->city->state->country->nombre !!}</p>
</div>

<!-- Departamento Id Field -->
<div class="field field_b">
    {!! Form::label('departamento_id', 'Departamento:') !!}
    <p>{!! $empresa->city->state->nombre !!}</p>
</div>

<!-- Nombre Field -->
<div class="field field_b">
    {!! Form::label('nombre', 'Ciudad:') !!}
    <p>{!! $empresa->city->nombre !!}</p>
</div>

<!-- Direccion Field -->
<div class="field field_a">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{!! $empresa->direccion !!}</p>
</div>

<!-- Telefono Field -->
<div class="field field_a">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{!! $empresa->telefono !!}</p>
</div>



