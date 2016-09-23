@include('materiaPrima.filter')
<div class="clearfix"></div>

<div class="result">
<h6>RESULTADOS</h6>
    @foreach($materiaPrima as $mp)
        <div class="resultbox">
            <div class="field">
                <a href="{!! route('materiaPrima.show', [$mp->id]) !!}" >
                    <i class="iconfont icon-view"></i>
                </a>
            </div>
            <div class="field" id="unidad">
                <label>Unidad Medida</label>
                {!! $mp->unidad_medida !!}
            </div>
            <div class="field" id="nombreFiltro">
                <label>Nombre</label>
                {!! $mp->nombre !!}
            </div>
            <div class="field" id="codigo">
                <label>Código</label>
                {!! $mp->codigo !!}
            </div>
        </div>
    @endforeach
</div>
{!! $materiaPrima->appends(Input::except('page'))->render() !!}
