


@if(isset($pcCuenta->clase_id))
<!-- Clase Id Field -->
<div class="form-group">
    {!! Form::label('clase_id', 'Clase:') !!}
    <p>{{$pcCuenta->clases->codigo}} - {{$pcCuenta->clases->nombre}}</p>
</div>
@endif

@if(isset($pcCuenta->grupo_id))
<!-- Grupo Id Field -->
<div class="form-group">
    {!! Form::label('grupo_id', 'Grupo:') !!}
    <p>{{$pcCuenta->grupos->codigo}} - {{$pcCuenta->grupos->nombre}}</p>
</div>
@endif

@if(isset($pcCuenta->cuenta_id))
<!-- Cuenta Id Field -->
<div class="form-group">
    {!! Form::label('cuenta_id', 'Cuenta:') !!}
    <p>{{$pcCuenta->cuentas->codigo}} - {{$pcCuenta->cuentas->nombre}}</p>
</div>
@endif

@if(isset($pcCuenta->subcuenta_id))
<!-- Subcuenta Id Field -->
<div class="form-group">
    {!! Form::label('subcuenta_id', 'Subcuenta:') !!}
    <p>{{$pcCuenta->subcuentas->codigo}} - {{$pcCuenta->subcuentas->nombre}}</p>
</div>
@endif

<!-- Codigo Field -->
<div class="form-group">
    {!! Form::label('codigo', 'Código:') !!}
    <p>{{ $pcCuenta->codigo }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $pcCuenta->nombre }}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{{ $pcCuenta->tipo }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripción:') !!}
    <p>{{ $pcCuenta->descripcion }}</p>
</div>

@if(isset($pcCuenta->ajuste))
<!-- Ajuste Field -->
<div class="form-group">
    {!! Form::label('ajuste', 'Ajuste:') !!}
    <p>{{ $pcCuenta->ajuste }}</p>
</div>
@endif


@if(isset($pcCuenta->naturaleza))
<!-- Naturaleza Field -->
<div class="form-group">
    {!! Form::label('naturaleza', 'Naturaleza:') !!}
    <p>{{ $pcCuenta->naturaleza }}</p>
</div>
@endif

@if(isset($pcCuenta->nativa))
<!-- Nativa Field -->
<div class="form-group">
    {!! Form::label('nativa', 'Nativa:') !!}
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
<div class="form-group">
    {!! Form::label('tercero_activo', 'Tercero Activo:') !!}
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
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>
        @if($pcCuenta->estado)
            ACTIVO
        @else
            INACTIVO
        @endif
    </p>
</div>
@endif
