@extends('layouts.app')

@section('content')
	@include('flash::message')
    @include('admin.usuarios.show_fields')

    {!! Form::open([
		'route' => ['admin.usuarios.destroy', $user->id], 
		'method' => 'delete', 
		'class' => 'form_delete']) 
	!!}
		<div class="form-group col-sm-12">
			<!--a href="{{ URL::previous() }}" class="btn btn-default" role="button" title='Atras'><i class="glyphicon glyphicon-menu-left"></i> Atras</a-->
		
			<a href="{!! route('admin.usuarios.index') !!}" class="btn btn-default" role="button" id='atras' title='Atras'><i class="glyphicon glyphicon-menu-left"></i> Atras</a>
			<a href="{!! route('admin.usuarios.edit', [$user->id]) !!}" class='btn btn-primary' id="link_editar" role="button" title='Editar' peticion="{{$peticion}}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
			{!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Eliminar '.$nombre, 'data-message' => '¿Esta seguro de eliminar el usuario?', 'class' => 'btn btn-danger', 'id' => 'eliminar', 'title' => "Eliminar ".$nombre, 'peticion' => $peticion ]) !!}
		</div>
	{!! Form::close() !!}
    <!-- Incluye el dialogo de confirmacion de eliminacion -->
    @include('forms.delete_modal')

@endsection

@section('scripts')
	{!! Html::script('/general/js/script_eliminar_por_ajax.js') !!}
@endsection
