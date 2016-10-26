@extends( $peticion == "normal" ? 'layouts.app' : 'layouts.empty' )
 
@section('content')

<div id="pc" class="contenido">

    <div class="contenedor crear">

        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $title_page='Crear '.$nombre }}
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>

            <div class="panel-body">
                <div class="collapse" id="collapseExample">
                    <div class="help well">
                        texto de ayuda   
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
                    {!! Form::open(['route' => 'admin.pc.'.$ruta.'.store', 'id' => 'pc_create', 'class' => 'form_create']) !!}

                        @include('admin.pc.pcCuentas.fields')

                    {!! Form::close() !!}
                </div>

            </div>
    </div>
</div>
@endsection