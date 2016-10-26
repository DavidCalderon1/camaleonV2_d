<div class="form-group">
    <!-- Id Field -->
    <div class="form-group">
        {!! Form::label('id', 'Id:') !!}
        <p>{!! $transaccion->id !!}</p>
    </div>

    <!-- Fecha Field -->
    <div class="form-group">
        {!! Form::label('fecha', 'Fecha:') !!}
        <p>{!! $transaccion->fecha !!}</p>
    </div>

    <!-- Tdc Id Field -->
    <div class="form-group">
        {!! Form::label('tdc_id', 'Tipo de transacción:') !!}
        <p>{!! $transaccion->tipodoc_contable->descripcion !!}</p>
    </div>

    <!-- Descripcion Field -->
    <div class="form-group">
        {!! Form::label('descripcion', 'Descripción:') !!}
        <p>{!! $transaccion->descripcion !!}</p>
    </div>
    

    <!-- Lista movimientos Field -->

    @include('admin.movimientosContables.index', [$peticion = 'busqueda', 'transaccion' => $transaccion->id])

    <!-- total_debe Field -->
    <div class="form-group">
        {!! Form::label('total_debe', 'Total debe:') !!}
        <p class="moneda">{!! $transaccion->total_debe !!}</p>
    </div>

    <!-- total_haber Field -->
    <div class="form-group">
        {!! Form::label('total_haber', 'Total haber:') !!}
        <p class="moneda">{!! $transaccion->total_haber !!}</p>
    </div>

    <!-- diferencia Field -->
    <div class="form-group">
        {!! Form::label('diferencia', 'Diferencia:') !!}
        <p class="moneda">{!! $transaccion->diferencia !!}</p>
    </div>


</div>