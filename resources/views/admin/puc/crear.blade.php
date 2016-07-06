@extends('layouts.principal')
@section('content')
	<div class="load_form_create" id="form_create">
		<div class="row">
	        <div class="col-sm-12">
	            <h1 class="pull-left">{{ $title_page='Creación de cuenta' }}</h1>
	        </div>
	    </div>
		@include('flash::message')
	    @include('core-templates::common.errors')
	    
		<div class="row">
			<form class="navbar-form navbar-left" id="find_form_create" >
			{!! Form::model(Request::All(), ['method' => 'get', 'class' => 'navbar-form navbar-left', 'id' => 'find_form_create']) !!}
			<!--action="{ { url('home/searchredirect') } }"-->
				<div class="form-group">
					{!! Form::label('tipo_cuenta', 'Tipo de cuenta: ') !!}
					{!! Form::select('tipo_cuenta', config('options.puc_types'), null, ['class' => 'form-control', 'required'])!!}
					<button type="submit" class="btn btn-default" id="Crear">
						<i class="glyphicon glyphicon-plus btn-xs"></i> Crear
					</button>
				</div>
			{!! Form::close() !!}
			<!-- /form -->
		</div>
		<hr>
		<div class="row">
			<div id="msg"></div>
			<div class="row results form_create_results" name="form_create_results" id="results">
				{!! $results !!}
			</div>
		</div>
	</div>
@endsection

@section('scripts')
    {!! Html::script('/general/js/script_buscar_crear_puc_load.js') !!}
	{!! Html::script('/general/js/script_select_scroll.js') !!}
@endsection