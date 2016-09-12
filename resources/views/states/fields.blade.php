<!-- Ajuste Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pais_id', 'Pais:') !!}
    {!! Form::select('pais_id', $countries, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el pais']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Departamento:') !!}
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
    <a href="{!! route('states.index') !!}" class="btn btn-default">Cancel</a>
</div>
