{!! Form::open(['route' => ['terceros.index'], 'method' => 'get']) !!}

    <div class="form-group col-sm-6">
        {!! Form::label('filtro', 'Filto:') !!}
        <br>
        {!! Form::label('tipoT', 'TODOS') !!}
        {!! Form::radio('tipo', 'TODOS', true,['id' => 'tipoT']) !!}
        {!! Form::label('tipoN', 'NATURAL') !!}
        {!! Form::radio('tipo', 'NATURAL', (Input::get('tipo') == 'NATURAL'),['id' => 'tipoN']) !!}
        {!! Form::label('tipoJ', 'JURIDICA') !!}
        {!! Form::radio('tipo', 'JURIDICA', (Input::get('tipo') == 'JURIDICA'),['id' => 'tipoJ']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::text('documento_nit', Input::get('documento_nit'), ['class' => 'form-control', 'placeholder' => 'Escribe un Documento o Nit.']) !!}
    </div>
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Filtrar', ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}