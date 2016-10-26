@include('terceros.filter')
<div class="clearfix"></div>
<div class="result">
    <h6>RESULTADOS</h6>
    @foreach($terceros as $tercero)
        <div class="resultbox">
            <div class="field" id="iconview">
                {!! Form::open(['route' => ['terceros.destroy', $tercero->id], 'method' => 'delete']) !!}
                <a href="{!! route('terceros.show', [$tercero->id]) !!}" class="iconfont icon-view"></a>
                {!! Form::close() !!}
            </div>
            <div class="field" id="tipo">
                <label>Tipo</label>
                {!! $tercero->tipo !!}
            </div>
            @if($tercero->tipo == 'NATURAL')
                <div class="field" id="nombre">
                    <label>Nombre</label>
                    {!! $tercero->nombre . ' ' . $tercero->apellido !!}
                </div>
                <div class="field" id="documento">
                    <label>Documento</label>
                    {!! $tercero->documento !!}
                </div>
            @else
                <div class="field" id="razon">
                    <label>Razon social</label>
                    {!! $tercero->razon_social !!}
                </div>
                <div class="field" id="nit">
                    <label>Nit</label>
                    {!! $tercero->nit !!}
                </div>
            @endif
        </div>
    @endforeach
</div>

{!! $terceros->appends(Input::except('page'))->render() !!}

