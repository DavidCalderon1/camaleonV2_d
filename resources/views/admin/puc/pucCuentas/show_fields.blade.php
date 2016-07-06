
@if(isset($pucCuenta->clase_id))
<!-- Clase Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clase_id', 'Clase:') !!}
    <p>{{$pucCuenta->clases->codigo}} - {{$pucCuenta->clases->nombre}}</p>
</div>
@endif

@if(isset($pucCuenta->grupo_id))
<!-- Grupo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grupo_id', 'Grupo:') !!}
    <p>{{$pucCuenta->grupos->codigo}} - {{$pucCuenta->grupos->nombre}}</p>
</div>
@endif

@if(isset($pucCuenta->cuenta_id))
<!-- Cuenta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuenta_id', 'Cuenta:') !!}
    <p>{{$pucCuenta->cuentas->codigo}} - {{$pucCuenta->cuentas->nombre}}</p>
</div>
@endif

@if(isset($pucCuenta->subcuenta_id))
<!-- Subcuenta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subcuenta_id', 'Subcuenta:') !!}
    <p>{{$pucCuenta->subcuentas->codigo}} - {{$pucCuenta->subcuentas->nombre}}</p>
</div>
@endif

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Código:') !!}
    <p>{{ $pucCuenta->codigo }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $pucCuenta->nombre }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-10 col-lg-10">
    {!! Form::label('descripcion', 'Descripción:') !!}
    <p>{{ $pucCuenta->descripcion }}</p>
</div>

@if(isset($pucCuenta->ajuste))
<!-- Ajuste Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ajuste', 'Ajuste:') !!}
    <p>{{ $pucCuenta->ajuste }}</p>
</div>
@endif


@if(isset($pucCuenta->naturaleza))
<!-- Naturaleza Field -->
<div class="form-group col-sm-6">
    {!! Form::label('naturaleza', 'Naturaleza:') !!}
    <p>{{ $pucCuenta->naturaleza }}</p>
</div>
@endif

@if(isset($pucCuenta->nativa))
<!-- Nativa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nativa', 'Nativa:') !!}
    <p>
        @if($pucCuenta->nativa)
            Si
        @else
            No
        @endif
    </p>
</div>
@endif

@if(isset($pucCuenta->tercero_activo))
<!-- Tercero Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tercero_activo', 'Tercero Activo:') !!}
    <p>
        @if($pucCuenta->tercero_activo)
            Si
        @else
            No
        @endif
    </p>
</div>
@endif

@if(isset($pucCuenta->estado))
<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    <p>
        @if($pucCuenta->estado)
            ACTIVO
        @else
            INACTIVO
        @endif
    </p>
</div>
@endif
