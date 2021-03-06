@extends( $peticion == "normal" ? 'layouts.app' : 'layouts.empty' )

@section('content')
        <div class="row clearfix">
            <h1 class="pull-left">{{ $title_page='Editar '.$nombre }}</h1>
        </div>

        @include('flash::message')
        @include('core-templates::common.errors')
        @if($peticion != "normal")
            @include( 'layouts.alerts' )
        @endif

        <div class="row">
            {!! Form::model($transaccion, ['route' => ['admin.transacciones.update', $transaccion->id], 'method' => 'patch', 'class' => 'form_update']) !!}

            @include('admin.transacciones.fields')

            {!! Form::close() !!}
        </div>
@endsection
