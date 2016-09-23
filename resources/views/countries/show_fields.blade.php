
<!-- Id Field -->
<div class="field" id="id">
    {!! Form::label('id', 'Id') !!}
    <p>{!! $country->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="field">
    {!! Form::label('nombre', 'Nombre') !!}
    <p>{!! $country->nombre !!}</p>
</div>

<!-- Codigo Ref Field -->
<div class="field">
    {!! Form::label('codigo_ref', 'Codigo Ref') !!}
    <p>{!! $country->codigo_ref !!}</p>
</div>

<div class="clearfix"></div>

{!! Form::open(['route' => ['countries.destroy', $country->id], 'method' => 'delete']) !!}
<div class='button'>
    <a href="{!! route('countries.edit', [$country->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i> Editar</a>
</div>
<div class='button'>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
</div>
{!! Form::close() !!}

