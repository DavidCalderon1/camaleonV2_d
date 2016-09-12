<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $persona->nombre !!}</p>
</div>

<!-- Apellido Field -->
<div class="form-group">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{!! $persona->apellido !!}</p>
</div>

<!-- Tipo Documento Field -->
<div class="form-group">
    {!! Form::label('tipo_documento', 'Tipo Documento:') !!}
    <p>{!! $persona->tipo_documento !!}</p>
</div>

<!-- Documento Field -->
<div class="form-group">
    {!! Form::label('documento', 'Documento:') !!}
    <p>{!! $persona->documento !!}</p>
</div>

<!-- Pais Id Field -->
<div class="form-group">
    {!! Form::label('pais_id', 'Pais:') !!}
    <p>{!! $persona->city->state->country->nombre !!}</p>
</div>

<!-- Departamento Id Field -->
<div class="form-group">
    {!! Form::label('departamento_id', 'Departamento:') !!}
    <p>{!! $persona->city->state->nombre !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Ciudad:') !!}
    <p>{!! $persona->city->nombre !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{!! $persona->direccion !!}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{!! $persona->telefono !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $persona->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $persona->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $persona->deleted_at !!}</p>
</div>

