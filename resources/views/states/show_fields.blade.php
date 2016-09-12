<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $state->id !!}</p>
</div>

<!-- Pais Id Field -->
<div class="form-group">
    {!! Form::label('pais_id', 'Pais:') !!}
    <p>{!! $state->country->nombre !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Departamento:') !!}
    <p>{!! $state->nombre !!}</p>
</div>

<!-- Codigo Ref Field -->
<div class="form-group">
    {!! Form::label('codigo_ref', 'Codigo Ref:') !!}
    <p>{!! $state->codigo_ref !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $state->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $state->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $state->deleted_at !!}</p>
</div>

{!! Form::open(['route' => ['states.destroy', $state->id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{!! route('states.edit', [$state->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i> Editar</a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
</div>
{!! Form::close() !!}