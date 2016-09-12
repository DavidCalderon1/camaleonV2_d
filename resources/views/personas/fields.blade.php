{!! Html::script('assets/js/localizacion.js') !!}


<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', Input::old('nombre'), ['class' => 'form-control text-uppercase']) !!}
</div>
<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::text('apellido', Input::old('apellido'), ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Tipo Documento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_documento', 'Tipo Documento:') !!}
    {!! Form::select('tipo_documento', ['CEDULA CIUDADANIA' => 'CEDULA CIUDADANIA', 'CEDULA EXTRANJERIA' => 'CEDULA EXTRANJERIA', 'PASAPORTE' => 'PASAPORTE'], Input::old('tipo_documento'), ['class' => 'form-control ', 'placeholder' => 'Seleccione el tipo de documento']) !!}
</div>

<!-- Documento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('documento', 'Documento:') !!}
    {!! Form::text('documento', Input::old('documento'), ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Pais Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pais_id', 'Pais:') !!}
    {!! Form::select('pais_id', $countries, Input::old('pais_id'), ['class' => 'form-control ', 'placeholder' => 'Seleccione el pais']) !!}
</div>

<!-- Departamento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departamento_id', 'Departamento:') !!}
    {!! Form::select('departamento_id', $states, Input::old('departamento_id'), ['class' => 'form-control ', 'placeholder' => 'Seleccione el departamento']) !!}
</div>

<!-- Ciudad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ciudad_id', 'Ciudad:') !!}
    {!! Form::select('ciudad_id', $cities, Input::old('ciudad_id'), ['class' => 'form-control ', 'placeholder' => 'Seleccione la ciudad']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', Input::old('direccion'), ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', Input::old('telefono'), ['class' => 'form-control']) !!}
</div>

