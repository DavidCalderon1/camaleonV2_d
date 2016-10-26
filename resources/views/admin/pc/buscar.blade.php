@extends('layouts.app')
@section('content')

<div id="pc" class="contenido">

    <div class="contenedor index">

	    <div class="panel panel-default">
	        <div class="panel-heading">
	            {{ $title_page='Busqueda de cuenta' }}
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

				<div class="buscador">

			    	<div class="field">FILTRAR POR:</div>

					<div class="field {!! (isset($pcBuscarParam))? 'active' : '' !!}">
							<a data-toggle="tab" href="#parametros">PARAMETROS</a>
					</div>

					<div class="field {!! (isset($pcBuscarLista))? 'active' : '' !!}">
						<a data-toggle="tab" href="#lista"> LISTA</a>
					</div>

				</div>

				<div class="clearfix"></div>

				<div class="tab-content">
						
					<div id="parametros" class="tab-pane fade {!! (isset($pcBuscarParam))? 'in active' : '' !!} tab_search">

						<div class="opciones_filtro">

							{!! Form::model( (isset($pcBuscarParam)? $pcBuscarParam : '' ), ['role' => 'search', 'id' => 'search_param', 'class' => '']) !!}

								<div class="fieldbox select">
									{!! Form::label('cuenta_tipo', 'Tipo') !!}
									{!! Form::select('cuenta_tipo', config('options.pc_types_all'), null, ['class' => 'form-control', 'required'])!!}
								</div>
								<div class="fieldbox select"> 
									{!! Form::label('cuenta_busqueda', 'Subtipo de cuenta') !!}
									{!! Form::select('cuenta_busqueda', config('options.pc_subtypes'), null, ['class' => 'form-control', 'required'])!!}
								</div>
								<div class="fieldbox textbox">
									<label>Busqueda</label>
									{!! Form::text('busqueda', null, ['class' => 'form-control text-uppercase', 'id' => 'busqueda', 'placeholder' => ''])!!}
								</div>
								<div class="button" id="filtrar">
									<button type="submit" class="btn btn-primary" id="Buscar">Filtrar</button>
								</div>

								{!! Form::hidden('search_param_data', (isset($pcBuscarParam)? $pcBuscarParam->search_param_data : 'tab=parametros' ), ['id' => 'parametrosUrl']) !!}

							{!! Form::close() !!}

						</div>

							<div id="msg"></div>
							<div class="results parametros_results" name="parametros_results" id="results">
								{!! (isset($parametros_results))? $parametros_results : '' !!}
							</div>
					
					</div>

					<div id="lista" class="tab-pane fade {!! (isset($pcBuscarLista))? 'in active' : '' !!} tab_search">
							
						<div class="opciones_filtro">
								
							{!! Form::model( (isset($pcBuscarLista)? $pcBuscarLista : '' ), ['role' => 'search', 'id' => 'search_list', 'class' => 'navbar-form navbar-left']) !!}
								
								@include('admin.pc.select_dynamic')
								
								
								<div class="button" id="filtrar">	
									<button type="submit" class="btn btn-primary" id="Buscar">Filtrar</button>
								</div>
								
								{!! Form::hidden('search_list_data', (isset($pcBuscarLista)? $pcBuscarLista->search_list_data : 'tab=lista' ), ['id' => 'parametrosUrl']) !!}
							
								{!! Form::close() !!}
						</div>

						<div class="clearfix"></div>

						<div class="row">

							<!-- aqui se guardan datos para enviar en la consulta -->
							<input name="cuenta_busqueda" id="cuenta_busqueda" value="{{  (isset($pcBuscarLista)? $pcBuscarLista->cuenta_busqueda : 'clases' ) }}" llave="{{  (isset($pcBuscarLista)? $pcBuscarLista->llave : '' ) }}" type="hidden">
							<div id="msg"></div>
							<div class="results lista_results" name="lista_results" id="results">
							{!! (isset($lista_results))? $lista_results : '' !!}
							</div>

						</div>

					</div>

				</div>

			</div>

		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
	        
		$(".fieldbox.select").animateSelect();
		$(".fieldbox.textbox").animateTextbox();
	        
	});

	</script>
@endsection

		@section('scripts')
			{!! Html::script('/assets/js/script_buscar_crear_pc_load.js') !!}
		@endsection