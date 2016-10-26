@extends('layouts.app')

@section('content')
	<div id="terceros" class="contenido">

		<div class="contenedor index">

			<div class="panel panel-default">
				<div class="panel-heading">
					Terceros
					<i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
				</div>
				<div class="panel-body">
					
					<div class="collapse" id="collapseExample">
					<div class="help well"> 
						 
                           <ul>
							<p>¿Cómo consultar un Tercero?</p>
                                <li>Seleccione el tipo de tercero que desea buscar, por medio de los elementos “radiobuttons”</li>

                                <li>Diligencie el campo de texto el número de documento (si es persona Natural) ó el Nit (en caso de ser Juridico)</li>
                            	<li>Haga Click en el botón “Filtrar”</li>
                            </ul>
                            
                            	<h5>Aquí usted puede:</h5>
                                    <p><i class="iconfont icon-add"></i> Crear Tercero</p>
                                    <p><i class="iconfont icon-view"></i> Visualizar Tercero</p>
							
							<br>

						<a href="#">Para obtener una guia detallada de este formulario consulte el manual en este link</a>

						

						
					</div>
					</div>

					@include('flash::message')

					<div class="icon_add"><a href="{!! route('terceros.create') !!}" class="iconfont icon-add"></a></div>
					<div class="clearfix"></div>
					@include('terceros.table')
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">

    $(document).ready(function(){

        $(".fieldbox.textbox").animateTextbox();
        $(".fieldbox.select").animateSelect();

    });
	</script>
        
@endsection
