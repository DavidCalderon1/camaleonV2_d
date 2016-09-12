@extends( $peticion == "normal" ? 'layouts.app' : 'layouts.empty' )

@section('content')
	@include('flash::message')
	<div class="row clearfix">
        <div class="col-sm-12">
            <h1 class="pull-left">{{ $title_page=ucfirst($nombre) }}</h1>
        </div>
    </div>
	
    @if($peticion != "normal")
        @include( 'layouts.alerts' )
    @endif

	<div class="row ver">
    	@include('admin.movimientosContables.show_fields')

    	{!! Form::open([
			'route' => ['admin.movimientosContables.destroy', $movimientoContable->id], 
			'method' => 'delete', 
			'class' => 'form_delete']) 
		!!}
			<div class="form-group col-sm-12">
			@if( isset($peticion) && $peticion == 'normal' )
				<a href="{{ URL::previous() }}" class="btn btn-default" role="button" id='atras' title='Atras'><i class="glyphicon glyphicon-menu-left"></i> Atras</a>
			@endif
				<a href="{!! route('admin.movimientosContables.edit', [$movimientoContable->id]) !!}" class='btn btn-primary' id="link_editar" role="button" title='Editar' peticion="{{$peticion}}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
				{!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Eliminar '.$nombre, 'data-message' => '¿Esta seguro de eliminar el registro?', 'class' => 'btn btn-danger', 'id' => 'eliminar', 'title' => "Eliminar ".$nombre, 'peticion' => $peticion ]) !!}
			</div>
		{!! Form::close() !!}
	    <!-- Incluye el dialogo de confirmacion de eliminacion -->
	    @include('forms.delete_modal')

	</div>
@endsection
