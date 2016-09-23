 
    {!! Form::open(['route' => ['sucursales.index'], 'method' => 'get']) !!}
    
        <div class="fieldbox textbox" id="buscar">
            {!! Form::text('nombre', Input::get('nombre'), ['class' => 'form-control text-uppercase']) !!}
        </div>
    
    
        <!-- Submit Field -->
        <div class="button" id="filtro">
            {!! Form::submit('Filtrar', ['class' => 'btn btn-primary']) !!}
        </div>
    
    {!! Form::close() !!}
