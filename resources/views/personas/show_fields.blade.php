<!-- Nombre Field -->
<div class="field field_a">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $persona->nombre !!}</p>
</div>

<!-- Apellido Field -->
<div class="field field_a">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{!! $persona->apellido !!}</p>
</div>

<!-- Tipo Documento Field -->
<div class="field field_a">
    {!! Form::label('tipo_documento', 'Tipo Documento:') !!}
    <p>{!! $persona->tipo_documento !!}</p>
</div>

<!-- Documento Field -->
<div class="field field_a">
    {!! Form::label('documento', 'Documento:') !!}
    <p>{!! $persona->documento !!}</p>
</div>

<!-- Pais Id Field -->
<div class="field field_b">
    {!! Form::label('pais_id', 'Pais:') !!}
    <p>{!! $persona->city->state->country->nombre !!}</p>
</div>

<!-- Departamento Id Field -->
<div class="field field_b">
    {!! Form::label('departamento_id', 'Departamento:') !!}
    <p>{!! $persona->city->state->nombre !!}</p>
</div>

<!-- Nombre Field -->
<div class="field field_b">
    {!! Form::label('nombre', 'Ciudad:') !!}
    <p>{!! $persona->city->nombre !!}</p>
</div>

<!-- Direccion Field -->
<div class="field field_a">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{!! $persona->direccion !!}</p>
</div>

<!-- Telefono Field -->
<div class="field field_a">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{!! $persona->telefono !!}</p>
</div>



