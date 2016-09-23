
@include('sucursales.filter')
<div class="clearfix"></div>
<div class="result">
    <h6>RESULTADOS</h6>
    @foreach($sucursales as $sucursal)
    <div class="resultbox">
        <div class="field" id="iconview">
            {!! Form::open(['route' => ['sucursales.destroy', $sucursal->id], 'method' => 'delete']) !!}
            <a href="{!! route('sucursales.show', [$sucursal->id]) !!}" class="iconfont icon-view"></a>
            <!-- <a href="{!! route('sucursales.edit', [$sucursal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}-->
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
