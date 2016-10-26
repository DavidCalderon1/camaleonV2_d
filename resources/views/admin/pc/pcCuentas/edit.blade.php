@extends( $peticion == "normal" ? 'layouts.app' : 'layouts.empty' )

@section('content')

<div id="pc" class="contenido">

    <div class="contenedor crear">

        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $title_page='Editar '.$nombre }}
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
	    		@if($peticion != "normal")
	        		@include( 'layouts.alerts' )
	    		@endif
				<div class="row">
					{!! Form::model($pcCuenta, ['route' => ['admin.pc.'.$ruta.'.update', $pcCuenta->id], 'method' => 'patch', 'class' => 'form_update']) !!}

						@include('admin.pc.pcCuentas.fields')

					{!! Form::close() !!}
				</div>
			</div>
			
		</div>
	</div>
</div>
	
@endsection
