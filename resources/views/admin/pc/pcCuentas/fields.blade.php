@include('admin.pc.select_dynamic')

<div class="clearfix"></div>
<!-- Codigo Field -->
<div class="fieldbox textbox">
    {!! Form::label('codigo', 'Código') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control text-uppercase codigo', 'required']) !!}
</div>
<div class="clearfix"></div>
<!-- Nombre Field -->
<div class="fieldbox textbox">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control text-uppercase', 'required']) !!}
</div>


<!-- Naturaleza Field -->
<div class="fieldbox select">
    {!! Form::label('tipo', 'Tipo') !!}
  @if($ruta != 'clases')
    {!! Form::select('tipo', config('options.pc_types'), null, ['class' => 'form-control', 'required', 'disabled' => 'disabled' ])!!}
    {!! Form::hidden('tipo', null, ['class' => 'form-control', 'required' ])!!}
  @else
    {!! Form::select('tipo', config('options.pc_types'), null, ['class' => 'form-control', 'required' ])!!}
  @endif
</div>

<div class="clearfix"></div>

<!-- Ajuste Field -->
<div class="fieldbox field_a">

    {!! Form::label('ajuste', 'Ajuste') !!}

    <div class="clearfix"></div>

    <div class="fieldbox radiobutton"> 
        {!! Form::label('mensual', 'MENSUAL') !!}
        {!! Form::radio('ajuste', 'MENSUAL', false, ['required','class' => 'form-element']) !!}
    </div>

    <div class="fieldbox radiobutton"> 
        {!! Form::label('anual', 'ANUAL') !!}
        {!! Form::radio('ajuste', 'ANUAL', false) !!}
    </div>

</div>



@if($ruta == 'clases')
<!-- Naturaleza Field -->
<div class="fieldbox field_a">

    {!! Form::label('naturaleza', 'Naturaleza:') !!}

    <div class="clearfix"></div>


    <div class="fieldbox radiobutton"> 
        {!! Form::label('debito', 'DEBITO') !!}
        {!! Form::radio('naturaleza', 'DEBITO', false, ['required','class' => 'form-element']) !!}
    </div>

    <div class="fieldbox radiobutton"> 
        {!! Form::label('credito', 'CREDITO') !!}
        {!! Form::radio('naturaleza', 'CREDITO', false) !!}
    </div>
</div>

@endif


@if($ruta == 'cuentasauxiliares')


<!-- Tercero Activo Field -->
<div class="fieldbox field_a">

    {!! Form::label('tercero_activo', 'Requiere Tercero/Activo:') !!}

    <div class="clearfix"></div>

    <div class="fieldbox radiobutton"> 
        {!! Form::label('SI', 'SI') !!}
        {!! Form::radio('tercero_activo', '1', false, ['required','class' => 'form-element']) !!}
    </div>

    <div class="fieldbox radiobutton"> 
        {!! Form::label('NO', 'NO') !!}
        {!! Form::radio('tercero_activo', '0', false) !!}
    </div>
</div>

@endif

<div class="clearfix"></div>

@if($ruta == 'cuentasauxiliares')
<!-- Estado Field -->

<div class="fieldbox field_a">

    {!! Form::label('estado', 'Estado:') !!}
    
    <div class="clearfix"></div>

    <div class="fieldbox radiobutton"> 
        {!! Form::label('activo', 'ACTIVO') !!}
        {!! Form::radio('estado', '1', false, ['required','class' => 'form-element']) !!}
    </div>

    <div class="fieldbox radiobutton"> 
        {!! Form::label('inactivo', 'INACTIVO') !!}
        {!! Form::radio('estado', '0', false) !!}
    </div>
</div>

@endif


<!-- Descripcion Field -->
<div class="fieldbox textarea" id="textarea">
    {!! Form::label('Descripción', 'Descripción') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'required']) !!}
</div>


<!-- Submit Field -->
<div class="button" id="save">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary enviar', 'peticion' => $peticion]) !!}
</div>
<div class="button">
    <a href="{!! (isset($pcCuenta)) ? route('admin.pc.'.$ruta.'.show',['id' => $pcCuenta->id]) : route('admin.pc.crear') !!}" class="btn btn-default cancelar" peticion="{{$peticion}}" >Cancelar</a>
    <!--a href="{ !! route('admin.pc.'.$ruta.'.index') !!}" class="btn btn-default">Cancelar</a-->
</div>

<script type="text/javascript">

    $(document).ready(function(){
        
        $(".fieldbox.textbox").animateTextbox();
        $(".fieldbox.select").animateSelect();
        $(".fieldbox.textarea").animateTextarea();
        $(".radiobutton").animateRadiobutton();
        
    });

</script>
