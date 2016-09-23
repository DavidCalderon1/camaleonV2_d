{!! Form::open(['route' => ['materiaPrima.index'], 'method' => 'get']) !!}

    <div class="fieldbox textbox" id="codigo">
        <label>Código</label>
        {!! Form::text('codigo', Input::get('codigo'), ['class' => 'form-control text-uppercase']) !!}
    </div>
    <div class="fieldbox textbox" id="nombre">
        <label>Nombre</label>
        {!! Form::text('nombre', Input::get('nombre'), ['class' => 'form-control text-uppercase']) !!}
    </div>
    <!-- Submit Field -->
    <div class="button" id="filtro">
        {!! Form::submit('Filtrar', ['class' => 'btn btn-primary']) !!}
    </div>
  
{!! Form::close() !!}

<script type="text/javascript">
                    
    $(document).ready(function(){
        
        $(".fieldbox.textbox").animateTextbox();
    });

</script>