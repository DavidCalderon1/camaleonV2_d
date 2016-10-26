@extends('layouts.app')
@section('content')
	<div class="row">
        <h1 class="pull-left">{{ $title_page='Búsqueda de transacción' }}</h1>
    </div>
	@include('flash::message')
    @include('core-templates::common.errors')
	<div class="ver search_content" id="parametros">
		<div class="row">
			{!! Form::open(['route' => ['admin.transacciones.buscar'], 'method' => 'get', 'id' => 'search_transaccion', 'role' => 'search', 'class' => 'navbar-form navbar-left form_search search_transaccion']) !!}
			<!--action="{ { url('home/searchredirect') } }"-->
				<div class="form-group">
					{!! Form::label('tipo_busqueda', 'Tipo de búsqueda: ') !!}
					{!! Form::select('tipo_busqueda', config('options.trans_busq_types'), Input::get('tipo'), ['class' => 'form-control', 'id' => 'tipo_busqueda', 'required'])!!}
					{!! Form::text('fecha', null, ['id' => 'busqueda', 'class' => 'datepicker form-control oculto text-uppercase', 'placeholder' => 'Busqueda ...', 'disabled' => 'disabled', 'required']) !!}
					{!! Form::select('tdc_id', $listTipoDocC, null, ['id' => 'busqueda', 'class' => 'form-control oculto', 'placeholder' => 'Busqueda ...', 'disabled' => 'disabled', 'required'])!!}
					{!! Form::text('descripcion', null, ['id' => 'busqueda', 'class' => 'form-control', 'placeholder' => 'Busqueda ...', 'disabled' => 'disabled', 'required']) !!}
					<button type="submit" class="btn btn-default" id="Buscar">
						<i class="glyphicon glyphicon-search btn-xs"></i> Buscar
					</button>
				</div>
			{!! Form::close() !!}
		</div>
		<hr>
		<div class="row">
			<div id="msg"></div>
			<div class="results transaccion_results" name="transaccion_results" id="results">
				@if( isset($transacciones) )
			        @include( 'admin.transacciones.index',[$peticion='busqueda'] )
			    @endif
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('/assets/js/script_buscar_crear_transaccion_load.js') !!}
@endsection