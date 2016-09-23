
{!! Html::script('assets/js/localizacion.js') !!}
<!-- Departamento Id Field -->
<div class="fieldbox select">
    {!! Form::label('pais_id', 'Pais') !!}
    {!! Form::select('pais_id', $countries, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el pais']) !!}
</div>

<!-- Departamento Id Field -->
<div class="fieldbox select">
    {!! Form::label('departamento_id', 'Departamento') !!}
    {!! Form::select('departamento_id', $states, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el departamento']) !!}
</div>

<!-- Nombre Field -->
<div class="fieldbox textbox">
    {!! Form::label('nombre', 'Ciudad') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Codigo Ref Field -->
<div class="fieldbox textbox">
    {!! Form::label('codigo_ref', 'Codigo Ref') !!}
    {!! Form::text('codigo_ref', null, ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Submit Field -->
<div class="button" id="save">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>

<div class="button">
    <a href="{!! route('cities.index') !!}" class="btn btn-default">Cancelar</a>
</div>
