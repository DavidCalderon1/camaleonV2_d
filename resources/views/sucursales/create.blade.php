@extends('layouts.app')

@section('content')

<div id="sucursal" class="contenido">
    <div class="contenedor">

        <div class="panel panel-default">
            <div class="panel-heading">
                Crear nueva sucursal
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>
            <div class="panel-body">

                <div class="collapse" id="collapseExample">
                    <div class="help well">
                            <ul>
                                <h5>¿Como Crear una Sucursal?</h5>
                                <li>Escribir el nombre de la nueva Sucursal en el campo 'Nombre'.</li>
                                <li>Seleccionar el nombre del País donde se encuentra esta Sucursal desde el campo 'País'.</li>
                                <li>Seleccionar el nombre del Departamento donde se encuentra esta Sucursal desde el campo 'Departamento'.</li>
                                <li>Seleccionar el nombre de la Cuidad donde se encuentra esta Sucursal desde el campo 'Ciudad'.</li>
                                <li>Escribir la dirección de la nueva Sucursal en el campo 'Direccion'.</li>
                                <li>Escribir el teléfono de la nueva Sucursal en el campo 'Teléfono'.</li>
                                <li>Seleccionar el botón 'Guardar' para registrar la información.</li>
                                <a href="#">Para obtener una guia detallada de este formulario consulte el manual en este link</a>
                            </ul> 
                    </div>
                    
                </div>
                @include('core-templates::common.errors')

                <div class="row">
                    <div id="create_button">
                    {!! Form::open(['route' => 'sucursales.store']) !!}

                        @include('sucursales.fields')
                    </div>
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
