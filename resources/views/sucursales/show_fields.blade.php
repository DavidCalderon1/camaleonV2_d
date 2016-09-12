<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $sucursal->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $sucursal->nombre !!}</p>
</div>

<!-- Pais Id Field -->
<div class="form-group">
    {!! Form::label('pais_id', 'Pais:') !!}
    <p>{!! $sucursal->city->state->country->nombre !!}</p>
</div>

<!-- Departamento Id Field -->
<div class="form-group">
    {!! Form::label('departamento_id', 'Departamento:') !!}
    <p>{!! $sucursal->city->state->nombre !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Ciudad:') !!}
    <p>{!! $sucursal->city->nombre !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{!! $sucursal->direccion !!}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{!! $sucursal->telefono !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $sucursal->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $sucursal->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $sucursal->deleted_at !!}</p>
</div>

{!! Form::open(['route' => ['sucursales.destroy', $sucursal->id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{!! route('sucursales.edit', [$sucursal->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i> Editar</a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
</div>
{!! Form::close() !!}
