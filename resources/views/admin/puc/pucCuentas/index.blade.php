@extends( $peticion == "normal" ? 'layouts.app' : 'layouts.empty' )
@section('content')
    @include('flash::message')
	<h1 class="pull-left">{{ $title_page=ucfirst($nombre).($nombre != 'cuentas auxiliares'?'s':'') }}</h1>
	@if( $peticion == "normal" )
    <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.puc.'.$ruta.'.create') !!}">Agregar {{ $nombre }}</a>
    @endif

    <div class="clearfix"></div>

    <div class="clearfix"></div>
	
    @include('admin.puc.pucCuentas.table')
	{!! $pucCuentas->render() !!}
        
@endsection
