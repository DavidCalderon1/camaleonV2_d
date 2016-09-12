@extends( $peticion == "normal" ? 'layouts.app' : 'layouts.empty' )

@section('content')
    @include('flash::message')
    <h1 class="pull-left">{{ $title_page='Transacciones' }}</h1>
    @if( $peticion == "normal" )
    <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.transacciones.create') !!}">Agregar {{ $nombre }}</a>
    @endif

    <div class="clearfix"></div>

    <div class="clearfix"></div>

    @include('admin.transacciones.table')
	{!! $transacciones->render() !!}
    
@endsection
