@extends('layouts.app')

@section('content')
<div id="pais" class="contenido">

    <div class="contenedor">

        <div class="panel panel-default">
            <div class="panel-heading">
                Crear Nuevo País
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>
            <div class="panel-body">

                <div class="collapse" id="collapseExample">
                    <div class="well">
                        Texto de ayuda
                    </div>
                </div>
                
                @include('core-templates::common.errors')

                <div class="row">
                    {!! Form::open(['route' => 'countries.store']) !!}

                        @include('countries.fields')

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

    $(document).ready(function(){

        $(".fieldbox.textbox").animateTextbox();
    });

</script>
@endsection
