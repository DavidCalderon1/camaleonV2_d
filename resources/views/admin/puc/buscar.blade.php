@extends('layouts.principal')
@section('content')
	<div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">{{ $title_page='Busqueda de cuenta' }}</h1>
        </div>
    </div>
	@include('flash::message')
    @include('core-templates::common.errors')
    <ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#parametros">
			<i class="glyphicon glyphicon-pencil btn-xs"></i> Parametros
			</a>
		</li>
		<li><a data-toggle="tab" href="#lista">
			<i class="glyphicon glyphicon-list btn-xs"></i> Lista
			</a>
		</li>
	</ul>
	<div class="tab-content">
		<div id="parametros" class="tab-pane fade in active tab_search">
			<div class="row">
				<form class="navbar-form navbar-left" role="search" id="search_param" >
				<!--action="{ { url('home/searchredirect') } }"-->
					<div class="form-group">
						{!! Form::label('cuenta_busqueda', 'Tipo de cuenta: ') !!}
						{!! Form::select('cuenta_busqueda', config('options.puc_types'), null, ['class' => 'form-control', 'required'])!!}
						<input type="text" class="form-control" name='busqueda' id='busqueda' placeholder="Busqueda ..." required/>
						<button type="submit" class="btn btn-default" id="Buscar">
							<i class="glyphicon glyphicon-search btn-xs"></i> Buscar
						</button>
					</div>
				</form>
			</div>
			<hr>
			<div class="row">
				<div id="msg"></div>
				<div class="row results parametros_results" name="parametros_results" id="results">
					{!! $results !!}
				</div>
			</div>
		</div>
		<div id="lista" class="tab-pane fade tab_search">
			<div class="row">
				<form class="navbar-form navbar-left" role="search" id="search_list" >
					@include('admin.puc.select_dynamic')
					
					<div class="col-sm-12 form-group buttons">
						<br>
						<button type="submit" class="btn btn-default" id="Buscar">
							<i class="glyphicon glyphicon-search btn-xs"></i> Buscar
						</button>
					</div>
				</form>
			</div>
			<hr>
			<div class="row">
				<!-- aqui se guardan datos para enviar en la consulta -->
				<input name="cuenta_busqueda" id="cuenta_busqueda" value="clases" llave="" type="hidden">
				<div id="msg"></div>
				<div class="row results lista_results" name="lista_results" id="results">
					
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('/general/js/script_buscar_crear_puc_load.js') !!}
	{!! Html::script('/general/js/script_select_scroll.js') !!}
@endsection