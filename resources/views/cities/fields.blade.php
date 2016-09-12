{!! Html::script('assets/js/jquery-1.11.3.js') !!}
{!! Html::script('assets/js/localizacion.js') !!}
<!-- Departamento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pais_id', 'Pais:') !!}
    {!! Form::select('pais_id', $countries, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el pais']) !!}
</div>

<!-- Departamento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departamento_id', 'Departamento:') !!}
    {!! Form::select('departamento_id', $states, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el departamento']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Ciudad:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Codigo Ref Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo_ref', 'Codigo Ref:') !!}
    {!! Form::text('codigo_ref', null, ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cities.index') !!}" class="btn btn-default">Cancel</a>
</div>
