
{!! Html::script('assets/js/tercero.js') !!}

<!-- Regimen Id Field -->
<div class="fieldbox select" id="regimen">
    {!! Form::label('regimen', 'Regimen:') !!}
    {!! Form::select('regimen', ['SIMPLIFICADO' => 'SIMPLIFICADO', 'COMUN' => 'COMUN'], null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el regimen']) !!}
</div>

<!-- Tipo Field -->
<div class="fieldbox field_a">

    {!! Form::label('tipo_tercero', 'Tipo:') !!}

    <div class="clearfix"></div>

    @if(!$disable)
    
    <div class="fieldbox radiobutton"> 
        {!! Form::label('tipoN', 'NATURAL') !!}
        {!! Form::radio('tipo', 'NATURAL', true,['id' => 'tipoN']) !!}
    </div>

    <div class="fieldbox radiobutton"> 
        {!! Form::label('tipoJ', 'JURIDICA') !!}
        {!! Form::radio('tipo', 'JURIDICA', false,['id' => 'tipoJ']) !!}
    </div>
    
    @else

    <div class="fieldbox radiobutton">
        {!! Form::label('tipoN', 'NATURAL') !!}
        {!! Form::radio('tipo', 'NATURAL', true,['id' => 'tipoN', 'disabled' => 'disabled']) !!}
    </div>

    <div class="fieldbox radiobutton">
        {!! Form::label('tipoJ', 'JURIDICA') !!}
        {!! Form::radio('tipo', 'JURIDICA', false,['id' => 'tipoJ', 'disabled' => 'disabled']) !!}
    </div>

    {!! Form::hidden('tipo') !!}

    @endif
</div>
<!-- Gran Contribuyente Field -->
<div class="fieldbox field_a">

    {!! Form::label('gran_contribuyente', 'Gran Contribuyente:') !!}

    <div class="clearfix"></div>

    <div class="fieldbox radiobutton ">
        {!! Form::label('SI') !!}
        {!! Form::radio('gran_contribuyente', '1') !!}
    </div>

    <div class="fieldbox radiobutton">
        {!! Form::label('NO') !!}
        {!! Form::radio('gran_contribuyente', '0', true) !!}
    </div>

</div>

<div class="clearfix"></div>

<div id="carga-form">
    <!--@ if((string)Session::get('tipo') == 'NATURAL')-->
    @if( $tipo == 'NATURAL' || \Session('tipo') == 'NATURAL')
        @include('personas.fields')
    @elseif( $tipo == 'JURIDICA' || \Session('tipo') == 'JURIDICA')
        @include('empresas.fields')
    @endif
</div>

<!-- Submit Field -->
<div class="button" id="guardar">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>

<div class="button">
    <a href="{!! route('terceros.index') !!}" class="btn btn-default">Cancelar</a>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){

        $(".radiobutton").animateRadiobutton();

    });

</script>
