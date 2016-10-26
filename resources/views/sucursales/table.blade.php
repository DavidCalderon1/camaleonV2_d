
@include('sucursales.filter')
<div class="clearfix"></div>
<div class="result">
    <h6>RESULTADOS</h6>
    @foreach($sucursales as $sucursal)
    <div class="resultbox">
        <div class="field" id="iconview">
            {!! Form::open(['route' => ['sucursales.destroy', $sucursal->id], 'method' => 'delete']) !!}
            <a href="{!! route('sucursales.show', [$sucursal->id]) !!}" class="iconfont icon-view"></a>
            
            {!! Form::close() !!}

        </div>
        <div class="field" id="nombre">
            <label>Nombre</label>
            {!! $sucursal->nombre !!}
        </div>
        <div class="field">
            <label>Ciudad</label>
            {!! $sucursal->city->nombre !!}
        </div>
        <div class="field">
            <label>Direccion</label>
            {!! $sucursal->direccion !!}
        </div>               
    </div>
     @endforeach
</div>
    
        
            
{!! $sucursales->appends(Input::except('page'))->render() !!}
