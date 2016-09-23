
{!! Html::script('assets/js/localizacion.js') !!}

<!-- Nombre Field -->
<div class="fieldbox textbox" id="nombre">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Pais Id Field -->
<div class="fieldbox select " id="pais">
    {!! Form::label('pais_id', 'Pais') !!}
    {!! Form::select('pais_id', $countries, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el pais']) !!}
</div>

<!-- Departamento Id Field -->
<div class="fieldbox select " id="departamento">
    {!! Form::label('departamento_id', 'Departamento') !!}
    {!! Form::select('departamento_id', $states, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el departamento']) !!}
</div>

<!-- Ciudad Id Field -->
<div class="fieldbox select " id="ciudad">
    {!! Form::label('ciudad_id', 'Ciudad') !!}
    {!! Form::select('ciudad_id', $cities, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione la ciudad']) !!}
</div>
<!-- Direccion Field -->
<div class="fieldbox textbox  " id="direccion">
    {!! Form::label('direccion', 'Direccion') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Telefono Field -->
<div class="fieldbox textbox  " id="telefono">
    {!! Form::label('telefono', 'Telefono') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="button" id="save">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>

<div class="button">
    <a href="{!! route('sucursales.index') !!}" class="btn btn-default">Cancelar</a>
</div>