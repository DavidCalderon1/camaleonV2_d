
    <!-- ?? -->
    @if(count($pcCuentas) == 0 )
            <p>No hay resultados </p>
    @endif
    <!-- ?? -->

@foreach($pcCuentas as $pcCuenta)

    <div class="resultbox">
        <div class='field'>
            <a href="{!! route('admin.pc.'.$ruta.'.show', [$pcCuenta->id]) !!}" id='link_ver' title='Ver'><i class="iconfont icon-view"></i></a>
        </div>
        <div class="field" id="codigo">
            <label>Código</label>
                {!! $pcCuenta->codigo !!}
        </div>
        <div class="field" id="nombre">
            <label>Nombre</label>
                {!! $pcCuenta->nombre !!}
        </div>
        <div class="field" id="tipo">
            <label>Tipo</label>
                {!! $pcCuenta->tipo !!}
        </div>
    </div>
@endforeach