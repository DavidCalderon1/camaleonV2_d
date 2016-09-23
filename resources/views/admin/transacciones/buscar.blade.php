@extends('layouts.app')
@section('content')
	<div class="row">
        <h1 class="pull-left">{{ $title_page='Búsqueda de transacción' }}</h1>
    </div>
	@include('flash::message')
    @include('core-templates::common.errors')
	<div class="ver" id="parametros">
		<div class="row">
			<form class="navbar-form navbar-left" role="search" id="search_param" >
			<!--action="{ { url('home/searchredirect') } }"-->
				<div class="form-group">
					{!! Form::label('tipo_busqueda', 'Tipo de búsqueda: ') !!}
					{!! Form::select('tipo_busqueda', config('options.trans_busq_types'), null, ['class' => 'form-control', 'id' => 'tipo_busqueda', 'required'])!!}
					{!! Form::date('fecha', null, ['id' => 'busqueda', 'class' => 'form-control oculto text-uppercase', 'placeholder' => 'Busqueda ...', 'disabled' => 'disabled', 'required']) !!}
					{!! Form::select('tdc_id', $listTipoDocC, null, ['id' => 'busqueda', 'class' => 'form-control oculto', 'placeholder' => 'Busqueda ...', 'disabled' => 'disabled', 'required'])!!}
					{!! Form::text('descripcion', null, ['id' => 'busqueda', 'class' => 'form-control', 'placeholder' => 'Busqueda ...', 'disabled' => 'disabled', 'required']) !!}
					<button type="submit" class="btn btn-default" id="Buscar">
						<i class="glyphicon glyphicon-search btn-xs"></i> Buscar
					</button>
				</div>
			</form>
		</div>
		<hr>
		<div class="row">
			<div id="msg"></div>
			<div class="results transaccion_results" name="transaccion_results" id="results">
				
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('/assets/js/script_buscar_transaccion_load.js') !!}
@endsection