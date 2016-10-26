@extends('layouts.app')

@section('content')

    @include('flash::message')
	<div class="row clearfix">
        <h1 class="pull-left">{{ $title_page=ucfirst($nombre) }}</h1>
    </div>
	
    @if($peticion != "normal")
        @include( 'layouts.alerts' )
    @endif

	<div class="row ver">
    	@include('admin.transacciones.show_fields')

    	{!! Form::open([
			'route' => ['admin.transacciones.destroy', $transaccion->id], 
			'method' => 'delete', 
			'class' => 'form_delete']) 
		!!}
			<div class="form-group">
			@if( isset($peticion) && $peticion == 'normal' )
				<a href="{{ URL::previous() }}" class="btn btn-default" role="button" id='atras' title='Atras'><i class="glyphicon glyphicon-menu-left"></i> Atras</a>
			@endif
			@if( $transaccion->auto == false )
				<a href="{!! route('admin.transacciones.edit', [$transaccion->id]) !!}" class='btn btn-primary' id="link_editar" role="button" title='Editar' peticion="{{$peticion}}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
				{!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Eliminar '.$nombre, 'data-message' => '¿Esta seguro de eliminar el registro?', 'class' => 'btn btn-danger', 'id' => 'eliminar', 'title' => "Eliminar ".$nombre, 'peticion' => $peticion ]) !!}
			@endif
			</div>
		{!! Form::close() !!}
	    <!-- Incluye el dialogo de confirmacion de eliminacion -->
	    @include('forms.delete_modal')

	</div>
@endsection
