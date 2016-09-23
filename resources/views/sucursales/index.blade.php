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
    				<div class="well">
    					Texto de ayuda
    					
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
