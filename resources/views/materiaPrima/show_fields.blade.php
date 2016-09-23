<!-- Id Field -->
<div class="field" id="id">
    {!! Form::label('id', 'Id') !!}
    <p>{!! $materiaPrima->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="field">
    {!! Form::label('nombre', 'Nombre') !!}
    <p>{!! $materiaPrima->nombre !!}</p>
</div>

<!-- Codigo Field -->
<div class="field">
    {!! Form::label('codigo', 'Codigo') !!}
    <p>{!! $materiaPrima->codigo !!}</p>
</div>

<!-- Unidad Medida Field -->
<div class="field">
    {!! Form::label('unidad_medida', 'Unidad Medida') !!}
    <p>{!! $materiaPrima->unidad_medida !!}</p>
</div>

<!-- Proveedor Field -->
<div class="field">
    {!! Form::label('proveedor', 'Proveedor') !!}
    <p>{!! $proveedor !!}</p>
</div>

<!-- Caracteristicas Field -->
<div class="field" id="caracteristica">
    {!! Form::label('caracteristicas', 'Caracteristicas') !!}
    <p>{!! $materiaPrima->caracteristicas !!}</p>
</div>




