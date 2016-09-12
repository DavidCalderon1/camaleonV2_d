@extends('layouts.app')
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
			{!! Form::model(['method' => 'get', 'class' => 'navbar-form navbar-left', 'id' => 'find_form_create']) !!}
			<!--action="{ { url('home/searchredirect') } }"-->
				<div class="form-group">
					{!! Form::label('subtipo_cuenta', 'Subtipo de cuenta: ') !!}
					{!! Form::select('subtipo_cuenta', config('options.pc_subtypes'), null, ['class' => 'form-control', 'required'])!!}
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
    {!! Html::script('/assets/js/script_buscar_crear_pc_load.js') !!}
@endsection