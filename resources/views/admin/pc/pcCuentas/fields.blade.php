@include('admin.pc.select_dynamic')


<!-- Codigo Field -->
<div class="form-group">
    {!! Form::label('codigo', 'Código:') !!}
    {!! Form::number('codigo', null, ['class' => 'form-control text-uppercase codigo', 'required']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control text-uppercase', 'required']) !!}
</div>


<!-- Naturaleza Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo: ') !!}
  @if($ruta != 'clases')
    {!! Form::select('tipo', config('options.pc_types'), null, ['class' => 'form-control', 'required', 'disabled' => 'disabled' ])!!}
    {!! Form::hidden('tipo', null, ['class' => 'form-control', 'required' ])!!}
  @else
    {!! Form::select('tipo', config('options.pc_types'), null, ['class' => 'form-control', 'required' ])!!}
  @endif
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Ajuste Field -->
<div class="form-group">
    {!! Form::label('ajuste', 'Ajuste:') !!}
    <br/>
    <div class="btn-group">
        <label class="btn btn-default">
    	   {!! Form::radio('ajuste', 'MENSUAL', false, ['required','class' => 'form-element']) !!}
            MENSUAL
    	</label>
    	<label class="btn btn-default">
    	   {!! Form::radio('ajuste', 'ANUAL', false) !!}
    	   ANUAL
    	</label>
    </div>
</div>

@if($ruta == 'clases')
<!-- Naturaleza Field -->
<div class="form-group">
    {!! Form::label('naturaleza', 'Naturaleza:') !!}
    <br/>
    <div class="btn-group">
        <label class="btn btn-default">
           {!! Form::radio('naturaleza', 'DEBITO', false, ['required','class' => 'form-element']) !!}
            DEBITO
        </label>
        <label class="btn btn-default">
           {!! Form::radio('naturaleza', 'CREDITO', false) !!}
           CREDITO
        </label>
    </div>
</div>
@endif

@if($ruta == 'cuentasauxiliares')
<!-- Tercero Activo Field -->
<div class="form-group">
    {!! Form::label('tercero_activo', 'Requiere Tercero/Activo:') !!}
    <br/>
    <div class="btn-group">
        <label class="btn btn-default">
            {!! Form::radio('tercero_activo', '1', false, ['required','class' => 'form-element']) !!}
            SI
        </label>
        <label class="btn btn-default">
            {!! Form::radio('tercero_activo', '0', false) !!}
            NO
        </label>
    </div>
</div>
@endif

@if($ruta == 'cuentasauxiliares')
<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <br/>
    <div class="btn-group">
        <label class="btn btn-default">
           {!! Form::radio('estado', '1', false, ['required','class' => 'form-element']) !!}
            ACTIVO
        </label>
        <label class="btn btn-default">
           {!! Form::radio('estado', '0', false) !!}
            INACTIVO
        </label>
    </div>
</div>
@endif


<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary enviar', 'peticion' => $peticion]) !!}
    <a href="{{ URL::previous() }}" class="btn btn-default cancelar" peticion="{{$peticion}}" >Cancelar</a>
    <!--a href="{!! route('admin.pc.'.$ruta.'.index') !!}" class="btn btn-default">Cancelar</a-->
</div>
