@extends('layouts.app')

@section('content')
    <div id="sucursal" class="contenido">
    	<div class="contenedor index">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				Sucursales
    				<i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
    				
    			</div>

    			<div class="panel-body">
    				
    				<div class="collapse" id="collapseExample">
        				<div class="help well">
        					
                                <ul>
                                <h5>¿Cómo consultar una Sucursal?</h5>
                                    <li>Diligencie el campo de texto con el nombre de la Sucursal.</li>
                                    <li>Haga Click en el botón 'Filtrar'</li>
                                </ul> 
                                 
                                     <h5>Aquí usted puede:</h5>
                                        <p><i class="iconfont icon-add"></i> Crear Sucursal</p>
                                        <p><i class="iconfont icon-view"></i> Visualizar Sucursal</p>
                                            
                           
        					<a href="#" class="manual">Para obtener una guia detallada de este formulario consulte el manual en este link</a>
        				</div>
    					
    				</div>
    				<div class="clearfix"></div>
    				@include('flash::message')
    				<div class="clearfix"></div>
					<div class="icon_add"><a href="{!! route('sucursales.create') !!}" class="iconfont icon-add"></a></div>

        				

        				

        				

        				@include('sucursales.table')
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
