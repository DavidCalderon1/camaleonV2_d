{!! Html::script('assets/js/localizacion.js') !!}

<!-- Nit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nit', 'Nit:') !!}
    {!! Form::text('nit', Input::old('nit'), ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razon_social', 'Razon Social:') !!}
    {!! Form::text('razon_social', Input::old('razon_social'), ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Naturaleza Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('naturaleza', 'Naturaleza:') !!}
    {!! Form::select('naturaleza', ['PUBLICA' => 'PUBLICA', 'MIXTA' => 'MIXTA', 'PRIVADA' => 'PRIVADA'], Input::old('naturaleza'), ['class' => 'form-control ', 'placeholder' => 'Seleccione la naturaleza de la empresa']) !!}
</div>

<!-- Fecha Constitucion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_constitucion', 'Fecha Constitucion:') !!}
    {!! Form::input('date','fecha_constitucion', Input::old('fecha_constitucion'), ['class' => 'form-control']) !!}
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
    {!! Form::text('telefono', Input::old('telefono'), ['class' => 'form-control text-uppercase']) !!}
</div>
