@if($peticion != "busqueda")
    @extends( $peticion == "normal" ? 'layouts.app' : 'layouts.empty' )
    @section( 'content')
@endif
    <div class="contenedor index">
    	<div class="panel panel-default">
    		<div class="panel-heading">
			    @if( !isset($title_page) ) 
                    {{ $title_page=ucfirst('movimientos contables') }}
                @else
                    {{ ucfirst('movimientos contables') }}
                @endif
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

				@if( $peticion == "normal" || $peticion == "busqueda" )
        		<div class="icon_add">
            		<a class="iconfont icon-add" href="{!! route('admin.transacciones.movimientosContables.create', ['transacciones' => $transaccion]) !!}" title="Agregar {{ $nombre }}"></a>
                </div>
			    @endif
            </div>
            <div class="panel-footer search_content">

			    @include('admin.movimientosContables.table')
                {!! $movimientoContables->appends(Input::except('page'))->render() !!}
        	</div>
	    </div>
    </div>
@if($peticion != "busqueda")
    @endsection
@endif    
