@extends('layouts.app')

@section('content')
<div id="materiaPrima" class="contenido">

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

    			@include('materiaPrima.show_fields')

			    {!! Form::open(['route' => ['materiaPrima.destroy', $materiaPrima->id], 'method' => 'delete']) !!}
			    <div class='button'>
			        <a href="{!! route('materiaPrima.edit', [$materiaPrima->id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-edit"></i> Editar</a>

			     </div>
			     <div class="button">
			        {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
			     </div>
			     <div class="button">
			    	<a href="{!! route('materiaPrima.index') !!}" class="btn btn-default">Atrás</a>
			    </div>
			    {!! Form::close() !!}
@endsection