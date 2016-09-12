<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $country->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $country->nombre !!}</p>
</div>

<!-- Codigo Ref Field -->
<div class="form-group">
    {!! Form::label('codigo_ref', 'Codigo Ref:') !!}
    <p>{!! $country->codigo_ref !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $country->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $country->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $country->deleted_at !!}</p>
</div>

{!! Form::open(['route' => ['countries.destroy', $country->id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{!! route('countries.edit', [$country->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i> Editar</a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
</div>
{!! Form::close() !!}

