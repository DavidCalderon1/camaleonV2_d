@extends('layouts.app')

@section('content')

<div id="auth_reset" class="contenido">

    <div class="contenedor">

        
    
        <div class="panel panel-default">
            <div class="panel-heading">
                Reset Password
                <i id="buton_help" class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#collapseExample"></i>
            </div>

            <div class="panel-body">

                <div class="collapse" id="collapseExample">
                    <div class="well">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                    {!! csrf_field() !!}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="{{ $errors->has('email') ? ' has-error' : '' }} fieldbox textbox">
                        <label>E-Mail</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="{{ $errors->has('password') ? ' has-error' : '' }} fieldbox textbox">
                        <label>Contraseña</label>
                            <input type="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                    </div>

                    <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }} fieldbox textbox">
                        <label>Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                    </div>

                    <div class="button">
                        <button type="submit" class="btn btn-primary">Restablecer Contraseña</button>
                    </div>

                </form>
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
