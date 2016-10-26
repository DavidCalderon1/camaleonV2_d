


@if(isset($pcCuenta->clase_id))
<!-- Clase Id Field -->
<div class="field importante">
    {!! Form::label('clase_id', 'Clase') !!}
    <p>{{$pcCuenta->clases->codigo}} - {{$pcCuenta->clases->nombre}}</p>
</div>
@endif

@if(isset($pcCuenta->grupo_id))
<!-- Grupo Id Field -->
<div class="field importante">
    {!! Form::label('grupo_id', 'Grupo') !!}
    <p>{{$pcCuenta->grupos->codigo}} - {{$pcCuenta->grupos->nombre}}</p>
</div>
@endif

@if(isset($pcCuenta->cuenta_id))
<!-- Cuenta Id Field -->
<div class="field importante">
    {!! Form::label('cuenta_id', 'Cuenta') !!}
    <p>{{$pcCuenta->cuentas->codigo}} - {{$pcCuenta->cuentas->nombre}}</p>
</div>
@endif

@if(isset($pcCuenta->subcuenta_id))


<!-- Codigo Field -->
<div class="field">
    {!! Form::label('codigo', 'Código') !!}
    <p>{{ $pcCuenta->codigo }}</p>
</div>

<!-- Nombre Field -->
<div class="field">
    {!! Form::label('nombre', 'Nombre') !!}
    <p>{{ $pcCuenta->nombre }}</p>
</div>

<!-- Subcuenta Id Field -->
<div class="field">
    {!! Form::label('subcuenta_id', 'Subcuenta') !!}
    <p>{{$pcCuenta->subcuentas->codigo}} - {{$pcCuenta->subcuentas->nombre}}</p>
</div>
@endif

<!-- Tipo Field -->
<div class="field">
    {!! Form::label('tipo', 'Tipo') !!}
    <p>{{ $pcCuenta->tipo }}</p>
</div>


<!-- Descripcion Field -->
<div class="field importante">
    {!! Form::label('descripcion', 'Descripción') !!}
    <p>{{ $pcCuenta->descripcion }}</p>
</div>

@if(isset($pcCuenta->ajuste))
<!-- Ajuste Field -->
<div class="field">
    {!! Form::label('ajuste', 'Ajuste') !!}
    <p>{{ $pcCuenta->ajuste }}</p>
</div>
@endif


@if(isset($pcCuenta->naturaleza))
<!-- Naturaleza Field -->
<div class="field">
    {!! Form::label('naturaleza', 'Naturaleza') !!}
    <p>{{ $pcCuenta->naturaleza }}</p>
</div>
@endif

@if(isset($pcCuenta->nativa))
<!-- Nativa Field -->
<div class="field">
    {!! Form::label('nativa', 'Nativa') !!}
    <p>
        @if($pcCuenta->nativa)
            Si
        @else
            No
        @endif
    </p>
</div>
@endif

@if(isset($pcCuenta->tercero_activo))
<!-- Tercero Activo Field -->
<div class="field">
    {!! Form::label('tercero_activo', 'Tercero Activo') !!}
    <p>
        @if($pcCuenta->tercero_activo)
            Si
        @else
            No
        @endif
    </p>
</div>
@endif

@if(isset($pcCuenta->estado))
<!-- Estado Field -->
<div class="field">
    {!! Form::label('estado', 'Estado') !!}
    <p>
        @if($pcCuenta->estado)
            ACTIVO
        @else
            INACTIVO
        @endif
    </p>
</div>
@endif

<div class="clearfix"></div>
