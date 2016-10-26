@extends('layouts.app')

@section('content')
<div id="terceros" class="contenido">
    
    <div class="contenedor">
        
        <div class="panel panel-default">

            <div class="panel panel-heading"> Editar Terceros
              <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>  
            </div>
            
            <div class="panel-body">
                
                <div class="collapse" id="collapseExample">
                    <div class="help well">
                        
                        <ul>
                            <h5>¿Como Editar un Tercero?</h5>
                                <li>Se puede modificar el régimen al que pertenece el tercero (común o simplificado) seleccionando una opción por medio del elemento 'Regimen'.</li>
                                <li>Se puede modificar si el tercero es ó no, gran contribuyente seleccionando una de las dos opciones.</li>
                                <li>
                                    En caso de ser un tercero de tipo natural...
                                    <ul>
                                        <li>Se puede modificar el nombre del tercero en el campo 'Nombre'.</li>
                                        <li>Se puede modificar el apellido del tercero en el campo 'Apellido'.</li>
                                        <li>Se puede modificar el tipo de documento seleccionando una opción en el campo 'Tipo Documento'.</li>
                                        <li>Se puede modificar el numero de documento del tercero en el campo 'Documento'.</li>
                                    </ul> 
                                </li>
                                <li>
                                    En caso de ser un tercero de tipo jurídico...
                                    <ul>
                                        <li>Se puede modificar el número de identificación tributario del tercero en el campo 'Nit'.</li>
                                        <li>Se puede modificar la razon social del tercero en el campo 'Razon Social'.</li>
                                        <li>Se puede modificar la naturaleza del tercero seleccionando una opción en el campo 'Naturaleza'.</li>
                                        <li>Se puede modificar la fecha de constitución del tercero seleccionando o escribiendo en el campo 'Fecha de Constitución'.</li>
                                    </ul> 
                                </li>
                                <li>
                                    Se puede modificar la localización...
                                    <ul>
                                        <li>Seleccionar el nombre del País donde  esta ubicado el tercero desde el campo 'País'.</li>
                                        <li>Seleccionar el nombre del Departamento donde esta ubicado el tercero desde el campo 'Departamento'.</li>
                                        <li>Seleccionar el nombre de la Cuidad donde esta ubicado el tercero desde el campo 'Ciudad'.</li>
                                    </ul>
                                </li>
                                <li>Se puede modificar la dirección del tercero en el campo 'Direccion'.</li>
                                <li>Se puede modificar el teléfono del tercero en el campo 'Teléfono'.</li>
                                <li>Seleccionar el botón 'Guardar' para modificar la información.</li>
                            <a href="#">Para obtener una guia detallada de este formulario consulte el manual en este link</a>

                        </ul> 
                       
                    </div>
                </div>

                @include('core-templates::common.errors')

                <div class="row">
                {!! Form::model($tercero, ['route' => ['terceros.update', $tercero->id], 'method' => 'patch']) !!}

                @include('terceros.fields')

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
