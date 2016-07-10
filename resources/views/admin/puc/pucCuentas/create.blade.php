@extends( $peticion == "normal" ? 'layouts.principal' : 'layouts.empty' )
 
@section('content')
    <div class="row clearfix">
        <div class="col-sm-12">
            <h1 class="pull-left">{{ $title_page='Crear '.$nombre }}</h1>
        </div>
    </div>
    @include('flash::message')
    @include('core-templates::common.errors')
    @if($peticion != "normal")
        @include( 'layouts.alerts' )
    @endif
    <!--laravel genera y requiere un token para verificar que las peticiones ajax no son malintencionadas-->
    <!--input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"-->

    <div class="row">
        {!! Form::open(['route' => 'admin.puc.'.$ruta.'.store', 'id' => 'puc_create', 'class' => 'form_create']) !!}

			@include('admin.puc.pucCuentas.fields')

        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    @if( isset($peticion) && $peticion == 'normal' )
    {!! Html::script('/general/js/script_select_scroll.js') !!}
    @endif
@endsection
