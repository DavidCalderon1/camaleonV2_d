@extends('layouts.app')

@section('content')
<div id="materiaPrima" class="contenido">

    <div class="contenedor">
        <div class="panel panel-default">

            <div class="panel-heading">
                Editar Materia Prima
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>
            <div class="panel-body">
                <div class="collapse" id="collapseExample">
                    <div class="help well">
                       <ul>
                            <h5>¿Como editar Materia Prima?</h5>

                            <li>Puede editar el código de referencia con el cual reconocerá la materia prima desde el campo 'Código'.</li>
                            <li>Puede editar el nombre de la materia prima desde el campo 'Nombre'.</li>
                            <li>Puede editar la unidad de medida desde el campo 'Unidad Medida'.</li>
                            <li>Puede editar el proveedor de dicho material desde el campo 'Tercero'.</li>
                            <li>Puede editar las caracteristicas de la materia prima desde el campo 'Caracteristicas'</li>
                            <li>De click en el botón “Guardar”.</li>
                            <a href="#">Para obetener una guia detallada de este formulario consulte el manual en este link</a>

                        </ul>  
                    </div>
                </div>
                @include('core-templates::common.errors')

                <div class="row">
                    {!! Form::model($materiaPrima, ['route' => ['materiaPrima.update', $materiaPrima->id], 'method' => 'patch']) !!}

                    @include('materiaPrima.fields')

                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>

</div>

@endsection
