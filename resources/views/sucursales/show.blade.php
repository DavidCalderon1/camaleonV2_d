@extends('layouts.app')

@section('content')
    

<div id="sucursal" class="contenido">
	<div class="contenedor show">
		<div class="panel panel-default">
			<div class="panel-heading">
              Detalles
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>
			<div class="panel-body">

					<div class="collapse" id="collapseExample">
        				<div class="help well"> 
                            <h5>Aquí usted puede:</h5>
                            <p><i class="iconfont icon-edit"></i>Editar Sucursal</p>
                            <p><i class="iconfont icon-trash"></i>Visualizar Sucursal</p>
                            <p><i class="glyphicon glyphicon-chevron-left"></i>Retroceder</p>
        					<a href="#" class="manual">Para obtener una guia detallada de este formulario consulte el manual en este link</a>
        				</div>
    				</div>

				@include('sucursales.show_fields')
				<div class="button">
           			<a href="{!! route('sucursales.index') !!}" class="btn btn-default">Atras</a>
    			</div>
			</div>
		</div>
	</div>
</div>

    
@endsection
