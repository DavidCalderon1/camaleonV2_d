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
                    <div class="help well">
                       <ul>
                            <h5>¿Como eliminar un País?</h5>
                            <li>De click en el botón “Eliminar”.</li>
                            <li>En el mensaje de confirmación de click en “Aceptar”.</li>
                        </ul>  
                        <h5>Aquí usted puede:</h5>
                        <p><i class="glyphicon glyphicon-edit"></i> Editar un País</p>
                        <p><i class="glyphicon glyphicon-chevron-left"></i> Retroceder</p>
                        <br>
                        <a href="#">Para obetener una guia detallada de este formulario consulte el manual en este link</a>   
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
