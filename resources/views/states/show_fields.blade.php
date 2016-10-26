<!-- Id Field -->
<div class="field" id="id">
    {!! Form::label('id', 'Id') !!}
    <p>{!! $state->id !!}</p>
</div>

<!-- Pais Id Field -->
<div class="field" id="pais">
    {!! Form::label('pais_id', 'Pais') !!}
    <p>{!! $state->country->nombre !!}</p>
</div>

<!-- Nombre Field -->
<div class="field">
    {!! Form::label('nombre', 'Departamento') !!}
    <p>{!! $state->nombre !!}</p>
</div>

<!-- Codigo Ref Field -->
<div class="field">
    {!! Form::label('codigo_ref', 'Codigo Ref') !!}
    <p>{!! $state->codigo_ref !!}</p>
</div>

<div class="clearfix"></div>

{!! Form::open(['route' => ['states.destroy', $state->id], 'method' => 'delete']) !!}
<div class='button'>
    <a href="{!! route('states.edit', [$state->id]) !!}" class='btn btn-primary'><i class="iconfont icon-edit"></i> Editar</a>
</div>
<div class='button'>
    {!! Form::button('<i class="iconfont icon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
</div>
{!! Form::close() !!}