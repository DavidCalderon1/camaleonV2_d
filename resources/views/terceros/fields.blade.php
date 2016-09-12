{!! Html::script('assets/js/jquery-1.11.3.js') !!}
{!! Html::script('assets/js/tercero.js') !!}

<!-- Regimen Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regimen', 'Regimen:') !!}
    {!! Form::select('regimen', ['SIMPLIFICADO' => 'SIMPLIFICADO', 'COMUN' => 'COMUN'], null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el regimen']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_tercero', 'Tipo:') !!}
    <br>
    @if(!$disable)
        {!! Form::label('tipoN', 'NATURAL') !!}
        {!! Form::radio('tipo', 'NATURAL', true,['id' => 'tipoN']) !!}
        {!! Form::label('tipoJ', 'JURIDICA') !!}
        {!! Form::radio('tipo', 'JURIDICA', false,['id' => 'tipoJ']) !!}
    @else
        {!! Form::label('tipoN', 'NATURAL') !!}
        {!! Form::radio('tipo', 'NATURAL', true,['id' => 'tipoN', 'disabled' => 'disabled']) !!}
        {!! Form::label('tipoJ', 'JURIDICA') !!}
        {!! Form::radio('tipo', 'JURIDICA', false,['id' => 'tipoJ', 'disabled' => 'disabled']) !!}
        {!! Form::hidden('tipo') !!}
    @endif
</div>
<!-- Gran Contribuyente Field -->
<div class="form-group col-sm-10">
    {!! Form::label('gran_contribuyente', 'Gran Contribuyente:') !!}
    <br>
    {!! Form::label('SI') !!}
    {!! Form::radio('gran_contribuyente', '1') !!}
    {!! Form::label('NO') !!}
    {!! Form::radio('gran_contribuyente', '0', true) !!}
</div>

<div id="carga-form">
    <!--@ if((string)Session::get('tipo') == 'NATURAL')-->
    @if( $tipo == 'NATURAL' || \Session('tipo') == 'NATURAL')
        @include('personas.fields')
    @elseif( $tipo == 'JURIDICA' || \Session('tipo') == 'JURIDICA')
        @include('empresas.fields')
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('terceros.index') !!}" class="btn btn-default">Cancel</a>
</div>
