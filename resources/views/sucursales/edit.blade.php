@extends('layouts.app')

@section('content')

    <div id="sucursal" class="contenido">
        <div class="contenedor">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    Editar Sucursal
                    <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
                </div>

                <div class="panel-body">
                    
                    <div class="collapse" id="collapseExample">
                        <div class="well">
                            texto de ayuda
                        </div>
                    </div>
                 @include('core-templates::common.errors')

                  <div class="row">
            {!! Form::model($sucursal, ['route' => ['sucursales.update', $sucursal->id], 'method' => 'patch']) !!}

            @include('sucursales.fields')

            {!! Form::close() !!}
                </div>   
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
