<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $city->id !!}</p>
</div>

<!-- Pais Id Field -->
<div class="form-group">
    {!! Form::label('pais_id', 'Pais:') !!}
    <p>{!! $city->state->country->nombre !!}</p>
</div>

<!-- Departamento Id Field -->
<div class="form-group">
    {!! Form::label('departamento_id', 'Departamento:') !!}
    <p>{!! $city->state->nombre !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Ciudad:') !!}
    <p>{!! $city->nombre !!}</p>
</div>

<!-- Codigo Ref Field -->
<div class="form-group">
    {!! Form::label('codigo_ref', 'Codigo Ref:') !!}
    <p>{!! $city->codigo_ref !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $city->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $city->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $city->deleted_at !!}</p>
</div>


{!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'delete']) !!}
    <div class='btn-group'>
         <a href="{!! route('cities.edit', [$city->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i> Editar</a>
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
    </div>
{!! Form::close() !!}