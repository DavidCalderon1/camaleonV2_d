{!! Form::open(['route' => ['admin.transacciones.movimientosContables.index', $transaccion], 'method' => 'get', 'id' => 'search_movimiento', 'class' => 'form_search search_movimiento']) !!}
    <input type="hidden" id="urlDestino" class="urlDestino" value="{{ route('admin.transacciones.movimientosContables.lista', ['transacciones' => $transaccion]) }}">
    <div class="fieldbox select">
        <label>Tipo de búsqueda</label>
        {!! Form::select('tipo_busqueda', config('options.mov_con_busq_types'), null, ['class' => 'form-control', 'id' => 'tipo_busqueda', 'required']) !!}
    </div>
    <div class="fieldbox select">
        <label>Parametro</label>
        {!! Form::text('busqueda', null, ['class' => 'form-control ', 'id' => 'busqueda', 'name' => 'busqueda_text', 'disabled']) !!}
        {!! Form::number('busqueda', null, ['class' => 'form-control oculto', 'id' => 'busqueda', 'name' => 'busqueda_text', 'disabled']) !!}
        {!! Form::select('busqueda_select', array(''), null, ['class' => 'form-control oculto', 'id' => 'busqueda', 'name' => 'busqueda_select', 'disabled']) !!}
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