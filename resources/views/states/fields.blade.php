<!-- Ajuste Field -->
<div class="fieldbox select" id="crear">
	{!! Form::label('País', 'País') !!}
    {!! Form::select('pais_id', $countries, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione  el país']) !!}
</div>
<div class="clearfix"></div>
<!-- Nombre Field -->
<div class="fieldbox textbox" id="crear">
    {!! Form::label('nombre', 'Departamento') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Codigo Ref Field -->
<div class="fieldbox textbox" id="crear">
    {!! Form::label('codigo_ref', 'Codigo Ref') !!}
    {!! Form::text('codigo_ref', null, ['class' => 'form-control text-uppercase']) !!}
</div>

<div class="clearfix"></div>

<!-- Submit Field -->
<div class="button" id="save">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>

<div class="button">
	<a href="{!! route('states.index') !!}" class="btn btn-default">Cancelar</a>
</div>
