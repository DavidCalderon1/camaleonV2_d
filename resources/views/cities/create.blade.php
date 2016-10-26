@extends('layouts.app')

@section('content')
<div id="ciudad" class="contenido">

    <div class="contenedor">
    
        <div class="panel panel-default">
            <div class="panel-heading">
                Crear Nueva Ciudad
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>
            <div class="panel-body">
                <div class="collapse" id="collapseExample">
                    <div class="help well">
                       <ul>
                            <h5>¿Como crear una Ciudad?</h5>
                            <li>Seleccione el País al que pertenece la Ciudad desde el campo'País'.</li>
                            <li>Seleccione el Departamento al que pertenece la Ciudad desde el campo 'Departamento'.</li>
                            <li>Diligencie el nombre de la Ciudad en el campo 'Ciudad'.</li>
                            <li>Diligencie el código de referencia con el cual reconocerá la Ciudad desde el campo 'Código Ref'.</li>
                            <li>De click en el botón “Guardar”.</li>
                            <a href="#">Para obetener una guia detallada de este formulario consulte el manual en este link</a>

                        </ul>     
                    </div>
                </div>

                @include('core-templates::common.errors')

                <div class="row">
                    {!! Form::open(['route' => 'cities.store']) !!}

                        @include('cities.fields')

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
