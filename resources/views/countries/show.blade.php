@extends('layouts.app')

@section('content')
<div id="pais" class="contenido">

    <div class="contenedor show">

	     <div class="panel panel-default">	
	     	<div class="panel-heading">
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>
			<div class="panel-body">

			 	<div class="collapse" id="collapseExample">
                    <div class="well">
                        Texto de ayuda
                    </div>
                </div>

				@include('flash::message')

			    @include('countries.show_fields')

			    <div class="button">
			           <a href="{!! route('countries.index') !!}" class="btn btn-default">Atrás</a>
			    </div>

			 </div>
		</div>
	</div>

</div>
@endsection
