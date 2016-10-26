{!! Html::script('assets/js/localizacion.js') !!}

<!-- Nit Field -->
<div class="fieldbox textbox field_a">
    {!! Form::label('nit', 'Nit') !!}
    {!! Form::text('nit', Input::old('nit'), ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Razon Social Field -->
<div class="fieldbox textbox field_a">
    {!! Form::label('razon_social', 'Razon Social') !!}
    {!! Form::text('razon_social', Input::old('razon_social'), ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Naturaleza Id Field -->
<div class="fieldbox select field_a">
    {!! Form::label('naturaleza', 'Naturaleza') !!}
    {!! Form::select('naturaleza', ['PUBLICA' => 'PUBLICA', 'MIXTA' => 'MIXTA', 'PRIVADA' => 'PRIVADA'], Input::old('naturaleza'), ['class' => 'form-control ', 'placeholder' => 'Seleccione la naturaleza de la empresa']) !!}
</div>

<!-- Fecha Constitucion Field -->
<div class="fieldbox date field_a">
    {!! Form::label('fecha_constitucion', 'Fecha Constitucion') !!}
    {!! Form::input('date','fecha_constitucion', Input::old('fecha_constitucion'), ['class' => 'form-control visible-xs mobile']) !!}
    <input class="form-control datepicker hidden-xs normal" type="text">  
</div>

<!-- Pais Id Field -->
<div class="fieldbox select field_b">
    {!! Form::label('pais_id', 'Pais') !!}
    {!! Form::select('pais_id', $countries, Input::old('pais_id'), ['class' => 'form-control ', 'placeholder' => 'Seleccione el pais']) !!}
</div>

<!-- Departamento Id Field -->
<div class="fieldbox select field_b">
    {!! Form::label('departamento_id', 'Departamento') !!}
    {!! Form::select('departamento_id', $states, Input::old('departamento_id'), ['class' => 'form-control ', 'placeholder' => 'Seleccione el departamento']) !!}
</div>

<!-- Ciudad Id Field -->
<div class="fieldbox select field_b">
    {!! Form::label('ciudad_id', 'Ciudad') !!}
    {!! Form::select('ciudad_id', $cities, Input::old('ciudad_id'), ['class' => 'form-control ', 'placeholder' => 'Seleccione la ciudad']) !!}
</div>

<!-- Direccion Field -->
<div class="fieldbox textbox field_a">
    {!! Form::label('direccion', 'Direccion') !!}
    {!! Form::text('direccion', Input::old('direccion'), ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Telefono Field -->
<div class="fieldbox textbox field_a">
    {!! Form::label('telefono', 'Telefono') !!}
    {!! Form::text('telefono', Input::old('telefono'), ['class' => 'form-control text-uppercase']) !!}
</div>

<script type="text/javascript">
    
    $(document).ready(function(){

        $(".fieldbox.textbox").animateTextbox();
        $(".fieldbox.select").animateSelect();

        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            startView: 1,
            language: "es",
            autoclose: true,
            keyboardNavigation: false
        });

        $('.date').animateDate();

    });

</script>
