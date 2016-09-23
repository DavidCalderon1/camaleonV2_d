<!-- Id Field -->
<div class="field" id="id">
    {!! Form::label('id', 'Id') !!}
    <p>{!! $city->id !!}</p>
</div>

<!-- Pais Id Field -->
<div class="field">
    {!! Form::label('pais_id', 'Pais') !!}
    <p>{!! $city->state->country->nombre !!}</p>
</div>

<!-- Departamento Id Field -->
<div class="field">
    {!! Form::label('departamento_id', 'Departamento') !!}
    <p>{!! $city->state->nombre !!}</p>
</div>

<!-- Nombre Field -->
<div class="field">
    {!! Form::label('nombre', 'Ciudad') !!}
    <p>{!! $city->nombre !!}</p>
</div>

<!-- Codigo Ref Field -->
<div class="field">
    {!! Form::label('codigo_ref', 'Codigo Ref') !!}
    <p>{!! $city->codigo_ref !!}</p>
</div>

<div class="clearfix"></div>

{!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'delete']) !!}
    <div class='button'>
         <a href="{!! route('cities.edit', [$city->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i> Editar</a>
    </div>
    <div class="button">
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
    </div>
{!! Form::close() !!}