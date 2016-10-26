{!! Html::script('assets/js/localizacion.js') !!}


<!-- Nombre Field -->
<div class="fieldbox textbox field_a">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', Input::old('nombre'), ['class' => 'form-control text-uppercase']) !!}
</div>
<!-- Apellido Field -->
<div class="fieldbox textbox field_a">
    {!! Form::label('apellido', 'Apellido') !!}
    {!! Form::text('apellido', Input::old('apellido'), ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Tipo Documento Id Field -->
<div class="fieldbox select field_a">
    {!! Form::label('tipo_documento', 'Tipo Documento') !!}
    {!! Form::select('tipo_documento', ['CEDULA CIUDADANIA' => 'CEDULA CIUDADANIA', 'CEDULA EXTRANJERIA' => 'CEDULA EXTRANJERIA', 'PASAPORTE' => 'PASAPORTE'], Input::old('tipo_documento'), ['class' => 'form-control ', 'placeholder' => 'Seleccione el tipo de documento']) !!}
</div>

<!-- Documento Field -->
<div class="fieldbox textbox field_a">
    {!! Form::label('documento', 'Documento') !!}
    {!! Form::text('documento', Input::old('documento'), ['class' => 'form-control text-uppercase']) !!}
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
    {!! Form::text('telefono', Input::old('telefono'), ['class' => 'form-control']) !!}
</div>

<script type="text/javascript">
    
    $(document).ready(function(){

        $(".fieldbox.textbox").animateTextbox();
        $(".fieldbox.select").animateSelect();
        $(".radiobutton").animateRadiobutton();

    });

</script>