@extends( $peticion == "normal" ? 'layouts.app' : 'layouts.empty' )

@section('content')
	<div class="row clearfix">
		<div class="col-sm-12">
			<h1 class="pull-left">{{ $title_page='Editar '.$nombre }}</h1>
		</div>
	</div>
	@include('flash::message')
	@include('core-templates::common.errors')
    @if($peticion != "normal")
        @include( 'layouts.alerts' )
    @endif
	<div class="row">
		{!! Form::model($pucCuenta, ['route' => ['admin.puc.'.$ruta.'.update', $pucCuenta->id], 'method' => 'patch', 'class' => 'form_update']) !!}

		@include('admin.puc.pucCuentas.fields')

		{!! Form::close() !!}
	</div>
@endsection
