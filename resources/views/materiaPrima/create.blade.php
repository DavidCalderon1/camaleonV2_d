@extends('layouts.app')

@section('content')
<div id="materiaPrima" class="contenido">

    <div class="contenedor">

        <div class="panel panel-default">

            <div class="panel-heading">
                Crear Nueva Materia Prima
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>
            <div class="panel-body">
                <div class="collapse" id="collapseExample">
                    <div class="help well">
                       <ul>
                            <h5>¿Como crear nueva Materia Prima?</h5>
                            <li>Diligencie el código de referencia con el cual reconocerá la materia prima en el campo 'Código'.</li>
                            <li>Diligencie el nombre de la materia prima en el campo 'Nombre'.</li>
                            <li>Diligencie la unidad de medida en el campo 'Unidad Medida'.</li>
                            <li>Seleccione el tercero, en este caso el proveedor de dicho material desde el campo 'Tercero'.</li>
                            <li>Diligencie las caracteristicas de la materia prima en el campo 'Caracteristicas'.</li>
                            <li>De click en el botón “Guardar”.</li>
                            <a href="#">Para obetener una guia detallada de este formulario consulte el manual en este link</a>

                        </ul>  
                    </div>
                </div>
                
                @include('core-templates::common.errors')

                <div class="row">
                    {!! Form::open(['route' => 'materiaPrima.store']) !!}

                        @include('materiaPrima.fields')

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
