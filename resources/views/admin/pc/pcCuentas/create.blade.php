@extends( $peticion == "normal" ? 'layouts.app' : 'layouts.empty' )
 
@section('content')
    <div class="row clearfix">
        <h1 class="pull-left">{{ $title_page='Crear '.$nombre }}</h1>
    </div>
    @include('flash::message')
    @include('core-templates::common.errors')
    @if($peticion != "normal")
        @include( 'layouts.alerts' )
    @endif
    <!--laravel genera y requiere un token para verificar que las peticiones ajax no son malintencionadas-->
    <!--input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"-->

    <div class="row">
        {!! Form::open(['route' => 'admin.pc.'.$ruta.'.store', 'id' => 'pc_create', 'class' => 'form_create']) !!}

			@include('admin.pc.pcCuentas.fields')

        {!! Form::close() !!}
    </div>

@endsection