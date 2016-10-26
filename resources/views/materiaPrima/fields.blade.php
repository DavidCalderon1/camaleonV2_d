<!-- Codigo Field -->
<div class="fieldbox textbox">
    {!! Form::label('código', 'Código') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="fieldbox textbox">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Unidad Medida Field -->
<div class="fieldbox textbox">
    {!! Form::label('unidad_medida', 'Unidad Medida') !!}
    {!! Form::text('unidad_medida', null, ['class' => 'form-control text-uppercase']) !!}
</div>

<!-- Tercero Id Field -->
<div class="fieldbox select">
    {!! Form::label('tercero_id', 'Tercero') !!}
    {!! Form::select('tercero_id', $proveedores, null, ['class' => 'form-control ', 'placeholder' => 'Seleccione el tercero.']) !!}
</div>

<!-- Caracteristicas Field -->
<div class="fieldbox textarea" id="textarea">
    {!! Form::label('caracteristicas', 'Caracteristicas') !!}
    {!! Form::textarea('caracteristicas', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Submit Field -->
<div class="button" id="save"">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
<div class="button">
    <a href="{!! route('materiaPrima.index') !!}" class="btn btn-default">Cancelar</a>
</div>

<script type="text/javascript">

    $(document).ready(function(){

        $(".fieldbox.textbox").animateTextbox();
        $(".fieldbox.select").animateSelect();
        $(".fieldbox.textarea").animateTextarea();
    });

</script>
