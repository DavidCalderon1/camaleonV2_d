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
                    <div class="well">
                        Texto de ayuda
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