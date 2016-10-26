<!-- Id Field -->
<div class="field field_1">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tercero->id !!}</p>
</div>


<!-- Tipo Field -->
<div class="field field_a">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $tercero->tipo !!}</p>
</div>

<!-- Regimen Field -->
<div class=" field field_a">
    {!! Form::label('regimen', 'Regimen:') !!}
    <p>{!! $tercero->regimen !!}</p>
</div>

<!-- Gran Contribuyente Field -->
<div class="field field_a">
    {!! Form::label('gran_contribuyente', 'Gran Contribuyente:') !!}
    @if($tercero->gran_contribuyente)
        <p>TRUE</p>
    @else
        <p>FALSE</p>
    
</div>
    @endif
<div class="clearfix"></div>
<div id="carga-form">
    @if( $tipo == 'NATURAL' || (string)Session::get('tipo') == 'NATURAL')
        @include('personas.show_fields' )
    @elseif( $tipo == 'JURIDICA' || (string)Session::get('tipo') == 'JURIDICA' )
        @include('empresas.show_fields' )
    @endif
</div>
<div class="clearfix"></div>
{!! Form::open(['route' => ['terceros.destroy', $tercero->id], 'method' => 'delete']) !!}
<div class='button'>
    <a href="{!! route('terceros.edit', [$tercero->id]) !!}" class='btn btn-primary'><i class="iconfont icon-edit"></i> Editar</a>
</div>
<div class='button'>
    {!! Form::button('<i class="iconfont icon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
</div>

{!! Form::close() !!}