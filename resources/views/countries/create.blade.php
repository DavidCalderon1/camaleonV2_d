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
                    <div class="help well">
                       <ul>
                            <h5>¿Como crear un País?</h5>
                            <li>Diligencie el nombre del País en el campo 'País'.</li>
                            <li>Diligencie el código de referencia con el cual reconocerá el país desde el campo 'Código Ref'.</li>
                            <li>De click en el botón “Guardar”.</li>
                            <a href="#">Para obetener una guia detallada de este formulario consulte el manual en este link</a>

                        </ul>     
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
