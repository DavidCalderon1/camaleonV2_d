{!! Form::open(['route' => ['terceros.index'], 'method' => 'get']) !!}

    <div class=" col-sm-12">
        <div class="fieldbox label">{!! Form::label('filtro', 'FILTRO:') !!}</div>

        <br>
            <div class="fieldbox  radiobutton col-sm-4">{!! Form::label('tipoT', 'TODOS') !!}
            {!! Form::radio('tipo', 'TODOS', true,['id' => 'tipoT']) !!}</div>

            <div class="fieldbox  radiobutton col-sm-4">{!! Form::label('tipoN', 'NATURAL') !!}
            {!! Form::radio('tipo', 'NATURAL', (Input::get('tipo') == 'NATURAL'),['id' => 'tipoN']) !!}</div>

            <div class="fieldbox  radiobutton col-sm-4">{!! Form::label('tipoJ', 'JURIDICA') !!}
            {!! Form::radio('tipo', 'JURIDICA', (Input::get('tipo') == 'JURIDICA'),['id' => 'tipoJ']) !!}</div>
    </div>
    <div class="fieldbox textbox" id="buscar">
        {!! Form::text('documento_nit', Input::get('documento_nit'), ['class' => 'form-control', 'placeholder' => 'Escribe un Documento o Nit.']) !!}
    </div>
    <!-- Submit Field -->
    <div class="button" id="filtro">
        {!! Form::submit('Filtrar', ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}

<script type="text/javascript">
    
    $(document).ready(function(){

        $(".radiobutton").animateRadiobutton();

    });

</script>