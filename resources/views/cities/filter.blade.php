{!! Form::open(['route' => ['cities.index'], 'method' => 'get']) !!}
   
    <div class="fieldbox textbox">
        <label>País</label>
        {!! Form::text('country', Input::get('country'), ['class' => 'form-control text-uppercase']) !!}
    </div>
    <div class="fieldbox textbox">
        <label>Departamento</label>
        {!! Form::text('state', Input::get('state'), ['class' => 'form-control text-uppercase']) !!}
    </div>
    <div class="fieldbox textbox">
        <label>Ciudad</label>
        {!! Form::text('city', Input::get('city'), ['class' => 'form-control text-uppercase']) !!}
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