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

    <div class="row">
        {!! Form::model($movimientoContable, ['route' => 'admin.transacciones.movimientosContables.store', 'id' => 'form_update', 'class' => 'form_update']) !!}

            @include('admin.movimientosContables.fields')

        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    {!! Html::script('/assets/js/script_tercero_activo_load.js') !!}
@endsection
