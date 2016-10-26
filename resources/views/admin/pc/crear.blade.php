@extends('layouts.app')
@section('content')

<div id="pc" class="contenido">

    <div class="contenedor">

    	<div class="panel panel-default">
            <div class="panel-heading">
		{{ $title_page='Creación de cuenta' }}
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
		    
				<div class="row" id="find_form_create">

					{!! Form::model(['method' => 'get', 'class' => 'navbar-form navbar-left', 'id' => 'find_form_create']) !!}
					<!--action="{ { url('home/searchredirect') } }"-->
						
					<div class="fieldbox select">
						{!! Form::label('subtipo_cuenta', 'Subtipo de cuenta') !!}
						{!! Form::select('subtipo_cuenta', config('options.pc_subtypes'), null, ['class' => 'form-control', 'required'])!!}
					</div>
					<div class="button">
						<button type="submit" class="btn btn-primary" id="Crear"> Crear
						</button>
					</div>						
					{!! Form::close() !!}
					<!-- /form -->
				</div>

				<!-- ?? -->

				<div class="row">
					<div id="msg"></div>
					<div class="results form_create_results" name="form_create_results" id="results">
						{!! $results !!}
					</div>
				</div>

				<!-- ?? -->

            </div>
        </div>
	</div>
</div>
<script type="text/javascript">

    $(document).ready(function(){
        
        $(".fieldbox.select").animateSelect();
        
    });

</script>

@endsection

@section('scripts')
    {!! Html::script('/assets/js/script_buscar_crear_pc_load.js') !!}
@endsection