@extends( $peticion == "normal" ? 'layouts.app' : 'layouts.empty' )

@section('content')
    <h1 class="pull-left">{{ $title_page=ucfirst('movimientos contables') }}</h1>

	@if( $peticion == "normal" )
    <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.transacciones.movimientosContables.create') !!}">Agregar {{ $nombre }}</a>
    @endif

    <div class="clearfix"></div>
    
	@include('flash::message')

    <div class="clearfix"></div>

    @include('admin.movimientosContables.table')
	{!! $movimientoContables->render() !!}
        
@endsection
