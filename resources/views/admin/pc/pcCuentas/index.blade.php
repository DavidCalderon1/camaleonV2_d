@extends( $peticion == "normal" ? 'layouts.app' : 'layouts.empty' )
@section('content')

    <div class="result">
        <h6>RESULTADOS DE : {{ $title_page=ucfirst($nombre).($nombre != 'cuentas auxiliares'?'s':'') }}</h6>


        <!-- ?? -->
        @if( $peticion == "normal" )
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.pc.'.$ruta.'.create') !!}">Agregar {{ $nombre }}</a>
        @endif
        <!-- ?? -->

        <div class="clearfix"></div>

        @include('flash::message')
        
        <div class="clearfix"></div>
        
        @include('admin.pc.pcCuentas.table')
        {!! $pcCuentas->appends(Input::except('page'))->render() !!}

    </div>    
@endsection
