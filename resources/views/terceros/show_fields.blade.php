<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tercero->id !!}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $tercero->tipo !!}</p>
</div>

<!-- Regimen Field -->
<div class="form-group">
    {!! Form::label('regimen', 'Regimen:') !!}
    <p>{!! $tercero->regimen !!}</p>
</div>

<!-- Gran Contribuyente Field -->
<div class="form-group">
    {!! Form::label('gran_contribuyente', 'Gran Contribuyente:') !!}
    @if($tercero->gran_contribuyente)
        <p>TRUE</p>
    @else
        <p>FALSE</p>
    @endif
</div>

<div id="carga-form">
    @if( $tipo == 'NATURAL' || (string)Session::get('tipo') == 'NATURAL')
        @include('personas.show_fields' )
    @elseif( $tipo == 'JURIDICA' || (string)Session::get('tipo') == 'JURIDICA' )
        @include('empresas.show_fields' )
    @endif
</div>

{!! Form::open(['route' => ['terceros.destroy', $tercero->id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{!! route('terceros.edit', [$tercero->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i> Editar</a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
</div>
{!! Form::close() !!}