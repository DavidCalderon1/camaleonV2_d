{!! Html::script('assets/js/jquery-1.11.3.js') !!}
{!! Html::script('assets/js/localizacion.js') !!}

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Pais Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pais_id', 'Pais:') !!}
    {!! Form::select('pais_id', $countries, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el pais']) !!}
</div>

<!-- Departamento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departamento_id', 'Departamento:') !!}
    {!! Form::select('departamento_id', $states, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el departamento']) !!}
</div>

<!-- Ciudad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ciudad_id', 'Ciudad:') !!}
    {!! Form::select('ciudad_id', $cities, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione la ciudad']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sucursales.index') !!}" class="btn btn-default">Cancel</a>
</div>
