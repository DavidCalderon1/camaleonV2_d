<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{{ '/assets/img/logo-01.ico' }}}">
    <title>Camale&oacute;n: {{ isset($title_page)? $title_page : 'Mas que un software contable' }}</title>


    {{--
    <link rel="stylesheet" type="text/css" href="{{ elixir('assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ elixir('assets/css/all.css') }}">
    --}}
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/all.css')}}">

    <!-- general styles -->
    {!! Html::style('/assets/css/styles.css') !!}

    {{-- <script type="text/javascript" src="{{ elixir('assets/js/app.js') }}"></script> --}}
    <script type="text/javascript" src="{{URL::asset('assets/js/app.js')}}"></script>

</head>
<body id="app-layout">

    <div id="board">
        <div id="header">
            @if (Auth::guest())
            <div id="header_a">
            @else
            <div id="header_a" class="onsession">
            @endif
            <a href="/" class="logo" >
                <img src="{{URL::asset('assets/resources/img/logo.png')}}" id="img_logo">
                @if (Auth::guest())
                <img src="{{URL::asset('assets/resources/img/logotipo_a.png')}}" id="img_logotipo">
                @else
                <img src="{{URL::asset('assets/resources/img/logotipo_b.png')}}" id="img_logotipo">
                @endif
            </a>
            </div>
            @if (Auth::guest())
            <div id="header_b" class="offsession">    
            @else
            <div id="header_b" class="onsession"> 
            @endif
                <div id="infuser" role="group">
                    @if (Auth::guest())
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{ url('/login') }}" >Login</a></li>
                        <li><a href="{{ url('/register') }}">Registro</a></li>
                    </ul>
                    @else
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li id="rol">
                            {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/logout') }}">Salir</a></li>
                    </ul>
                    @endif
                    <div data-toggle="dropdown">
                        @if (Auth::guest())
                        <i class="iconfont icon-log_a"></i>
                        @else
                        <i class="iconfont icon-log_b"></i>
                        @endif
                    </div>   
                </div>
            </div>
        </div>

        <div id="body">
            @if (Auth::guest())
            <div id="subbody" class="col-md-12 col-sm-12">
            @else
            <div id="menu">
                @include('layouts.menu')
            </div>
            <div id="subbody" class="col-md-9 col-sm-8">
            @endif

                @yield('content')

            </div>

        </div>

        <div id="container-loading"><i class="iconfont icon-loading_a"></i></div>

    </div>


    <!-- assets scripts -->    
    {!! Html::script('/assets/js/script_select_dynamic.js') !!}
    {!! Html::script('/assets/js/script_eliminar_por_ajax.js') !!}
    <script>
    	
        (function() {
            $body = $("body");
            //esta funcion permite, al momento de enviar una peticion ajax, la ejecucion de la pantalla que muestra un gif con tres puntos
            $(document).on({
                ajaxStart: function() { $('#container-loading').addClass("show"); },
                ajaxStop: function() { $('#container-loading').removeClass("show"); }    
            });

            //se encarga mostrar la pantalla que muestra un gif con tres puntos cuando se da click en un link que recargue la pagina
            $(document).on('click','div#menu a',function(e){
                $('#container-loading').addClass("show");
            });
            //configura el formato de la fecha y el idioma para los elementos con la clase datepicker los cuales mostraran un calendario para las fechas y se podran ver en chrome o firefox
            $( function() {
                $.fn.datepicker.defaults.format = "yyyy-mm-dd";
                $.fn.datepicker.defaults.language = "es";
                $(".datepicker").attr('data-date-format','yyyy-mm-dd');
                $(".datepicker").datepicker();
            });

        })();
    </script>
    @yield('scripts')

</body>
</html>