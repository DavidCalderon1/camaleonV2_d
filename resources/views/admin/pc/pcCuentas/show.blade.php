@extends( $peticion == "normal" ? 'layouts.app' : 'layouts.empty' )

@section('content')

<div id="pc" class="contenido">

    <div class="contenedor show">

        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $title_page=ucfirst($nombre) }}
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>

            <div class="panel-body">
                <div class="collapse" id="collapseExample">
                    <div class="help well">
                        texto de ayuda   
                    </div>
                </div>

				@include('flash::message')
				
			    @if($peticion != "normal")
			        @include( 'layouts.alerts' )
			    @endif

					@include('admin.pc.pcCuentas.show_fields')
					
					{!! Form::open([
						'route' => ['admin.pc.'.$ruta.'.destroy', $pcCuenta->id], 
						'method' => 'delete', 
						'class' => 'form_delete']) 
					!!}

							<div class='button'>
								<a href="{!! route('admin.pc.'.$ruta.'.edit', [$pcCuenta->id]) !!}" class='btn btn-primary' id="link_editar" role="button" title='Editar' peticion="{{$peticion}}"><i class="iconfont icon-edit"></i> Editar</a>
							</div>

							<div class='button'>
								{!! Form::button('<i class="iconfont icon-trash"></i> Eliminar', ['data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Eliminar '.$nombre, 'data-message' => '¿Esta seguro de eliminar el registro?', 'class' => 'btn btn-danger', 'id' => 'eliminar', 'title' => "Eliminar ".$nombre, 'peticion' => $peticion ]) !!}
							</div>
								<!--a href="{{ URL::previous() }}" class="btn btn-default" role="button" title='Atras'><i class="glyphicon glyphicon-menu-left"></i> Atras</a-->

							@if( isset($peticion) && $peticion == 'normal' )
								<div class='button'>
									<a href="{!! route('admin.pc.buscar') !!}" class="btn btn-default" role="button" id='atras' title='Atras'> Atrás</a>
								</div>

							@endif
					{!! Form::close() !!}
				    <!-- Incluye el dialogo de confirmacion de eliminacion -->
				    @include('forms.delete_modal')

				

			</div>
		</div>
	</div>
</div>

@endsection
