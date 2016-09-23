<!-- Id Field -->
<div class="field" id="id">
    {!! Form::label('id', 'Id') !!}
    <p>{!! $sucursal->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="field" id="nombre">
    {!! Form::label('nombre', 'Nombre') !!}
    <p>{!! $sucursal->nombre !!}</p>
</div>

<!-- Pais Id Field -->
<div class="field loc">
    {!! Form::label('pais_id', 'Pais') !!}
    <p>{!! $sucursal->city->state->country->nombre !!}</p>
</div>

<!-- Departamento Id Field -->
<div class="field loc">
    {!! Form::label('departamento_id', 'Departamento') !!}
    <p>{!! $sucursal->city->state->nombre !!}</p>
</div>

<!-- Nombre Field -->
<div class="field loc">
    {!! Form::label('nombre', 'Ciudad') !!}
    <p>{!! $sucursal->city->nombre !!}</p>
</div>

<!-- Direccion Field -->
<div class="field">
    {!! Form::label('direccion', 'Direccion') !!}
    <p>{!! $sucursal->direccion !!}</p>
</div>

<!-- Telefono Field -->
<div class="field">
    {!! Form::label('telefono', 'Telefono') !!}
    <p>{!! $sucursal->telefono !!}</p>
</div>
<div class="clearfix"></div>
{!! Form::open(['route' => ['sucursales.destroy', $sucursal->id], 'method' => 'delete']) !!}
<div class='button'>
    <a href="{!! route('sucursales.edit', [$sucursal->id]) !!}" class=' btn btn-primary'><i class="iconfont icon-edit"></i> Editar</a>
</div>
<div class='button'>
    {!! Form::button('<i class="iconfont icon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
    
</div>
{!! Form::close() !!}
