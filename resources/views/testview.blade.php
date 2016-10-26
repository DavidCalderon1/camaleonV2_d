@extends('layouts.app')

@section('content')

<div id="home" class="contenido">

    <div class="contenedor">

        <div class="panel panel-default">
            <div class="panel-heading">
                Dashboard
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>

            <div class="panel-body">

                <div class="collapse" id="collapseExample">
                    <div class="well">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>

                <form action="/test/save" method="post">

                    <div class="fieldbox textbox col-md-12">
                        <label>E-Mail</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="fieldbox select col-md-12">
                        <label>País</label>
                        <select class="form-control">
                            <option>COLOMBIA</option>
                            <option>VENEZUELA</option>
                            <option>PANAMA</option>
                        </select>
                    </div>

                    </br>

                    <div class="fieldbox textbox col-md-6">
                        <label for="date">Fecha</label>
                        <input type="text" class="form-control datepicker hidden-xs" name="date">
                        <input type="date" class="form-control visible-xs" name="date">
                    </div>
                    
                    <button type="submit" class="btn btn-default btn-primary">Enviar</button>

                </form>

                <script type="text/javascript">
                    
                $(document).ready(function(){
                    
                    $('.datepicker').datepicker({
                        format: "dd/mm/yyyy",
                        startView: 1,
                        language: "es",
                        autoclose: true,
                        keyboardNavigation: false
                    });

                    $(".fieldbox.textbox").animateTextbox();
                    $(".fieldbox.select").animateSelect();

                });

                </script>

            </div>
        </div>
    </div>

</div>

@endsection
