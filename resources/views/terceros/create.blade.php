@extends('layouts.app')

@section('content')
<div id="terceros" class="contenido">
    
    <div class="contenedor">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                Crear Nuevo Tercero
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>
            <div class="panel-body">
                <div class="collapse" id="collapseExample">
                    <div class="help well">
                        
                            <ul>
                            <h5>¿Como Crear un Tercero?</h5>
                                <li>Seleccionar el régimen al que pertenece el tercero (común o simplificado) por medio del elemento 'Régimen'.</li>
                                <li>Seleccionar el tipo tercero que desea crear (natural ó jurídico).</li>
                                <li>Seleccionar si el tercero es ó no, gran contribuyente.</li>
                                <li>
                                    En caso de haber seleccionado tercero de tipo natural...
                                    <ul>
                                        <li>Escribir el nombre del tercero en el campo 'Nombre'.</li>
                                        <li>Escribir el apellido del tercero en el campo 'Apellido'.</li>
                                        <li>Seleccionar el tipo de documento en el campo 'Tipo Documento'.</li>
                                        <li>Escribir el numero de documento del tercero en el campo 'Documento'.</li>
                                    </ul> 
                                </li>
                                <li>
                                    En caso de haber seleccionado tercero de tipo jurídico...
                                    <ul>
                                        <li>Escribir el número de identificación tributario del tercero en el campo 'Nit'.</li>
                                        <li>Escribir la razon social del tercero en el campo 'Razon Social'.</li>
                                        <li>Seleccionar la de naturaleza del tercero en el campo 'Naturaleza'.</li>
                                        <li>Seleccionar o escribir la fecha de constitución del tercero en el campo 'Fecha de Constitución'.</li>
                                    </ul> 
                                </li>
                                <li>Seleccionar el nombre del País donde  esta ubicado el tercero desde el campo 'País'.</li>
                                <li>Seleccionar el nombre del Departamento donde esta ubicado el tercero desde el campo 'Departamento'.</li>
                                <li>Seleccionar el nombre de la Cuidad donde esta ubicado el tercero desde el campo 'Ciudad'.</li>
                                <li>Escribir la dirección del tercero en el campo 'Direccion'.</li>
                                <li>Escribir el teléfono del tercero en el campo 'Teléfono'.</li>
                                <li>Seleccionar el botón 'Guardar' para registrar la información.</li>
                                <a href="#">Para obtener una guia detallada de este formulario consulte el manual en este link</a>
                            </ul> 
                        
                    </div>
                </div>
                @include('core-templates::common.errors')
                  <div class="row">
                    {!! Form::open(['route' => 'terceros.store']) !!}
                        @include('terceros.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
