@extends('layouts.app')

@section('content')
<div id="departamento" class="contenido">

    <div class="contenedor">

        <div class="panel panel-default">
            <div class="panel-heading">
                Editar Departamento
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>
             <div class="panel-body">

                <div class="collapse" id="collapseExample">
                    <div class="help well">
                       <ul>
                            <h5>¿Como editar un Departamento?</h5>
                            <li>Puede editar el país al que pertenece el departamento desde el campo 'País'.</li>
                            <li>Puede editar el nombre del departamento desde el campo 'Departamento'.</li>
                            <li>Puede editar el código de referencia desde el campo 'Código Ref'.</li>
                            <li>De click en el botón “Guardar”.</li>
                            <a href="#">Para obetener una guia detallada de este formulario consulte el manual en este link</a>

                        </ul>     
                    </div>
                </div>

                @include('core-templates::common.errors')

                <div class="row">
                    {!! Form::model($state, ['route' => ['states.update', $state->id], 'method' => 'patch']) !!}

                    @include('states.fields')

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
