@extends('layouts.app')

@section('content')
<div id="materiaPrima" class="contenido">

    <div class="contenedor index">

    	<div class="panel panel-default">
    		<div class="panel-heading">
                Materia Prima
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>

            <div class="panel-body">

                <div class="collapse" id="collapseExample">
                    <div class="help well">
                        <ul>
                            <h5>¿Como consultar Materia Prima?</h5>
                            <li>Diligencie los campos de texto con el código y el nombre de la Materia Prima.</li>
                            <li>De click en el botón “Filtrar”.</li>
                        </ul>     
                        <h5>Aquí usted puede:</h5>
                        <p><i class="iconfont icon-add"></i> Crear Materia Prima</p>
                        <p><i class="iconfont icon-view"></i> Visualizar Materia Prima</p>
                        <br>
                        <a href="#">Ingrese al manual de usuario Módulo Materia Prima</a>
                    </div>
                </div>

                <div class="clearfix"></div>

                @include('flash::message')

        		<div class="clearfix"></div>

        		<div class="icon_add">
            		<a class="iconfont icon-add" href="{!! route('materiaPrima.create') !!}"></a>
        		</div>

				@include('materiaPrima.table')

			</div>
	     </div>
     </div>
</div>  
@endsection
