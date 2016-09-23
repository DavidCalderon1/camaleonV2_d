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
				@include('sucursales.show_fields')
				<div class="button">
           			<a href="{!! route('sucursales.index') !!}" class="btn btn-default">Back</a>
    			</div>
			</div>
		</div>
	</div>
</div>

    
@endsection
