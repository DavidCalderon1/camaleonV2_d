<!-- para peticiones ajax -->
@yield( isset($tipo) ? 'data' : 'content')

<!-- aqui se mostraran los scripts colocados en las vistas en la misma seccion -->
@section('script')

@show