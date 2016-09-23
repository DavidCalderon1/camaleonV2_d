<div class="panel panel-default">
  <div class="panel-body">
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

    <!-- Descripcion Field -->
    <div class="form-group">
    	<h3 class="pull-left">Movimientos contables</h3>

        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.transacciones.movimientosContables.create',['transacciones' => $transaccion->id ]) !!}">Agregar movimiento</a>
    </div>
    
  </div>
  <div class="panel-footer">

    @include('admin.movimientosContables.table', ['transaccion' => $transaccion->id])

  </div>
</div>