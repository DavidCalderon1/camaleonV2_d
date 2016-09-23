
@include('countries.filter')
<div class="clearfix"></div>

<div class="result">
    <h6>RESULTADOS</h6>

    @foreach($countries as $country)
        <div class="resultbox">
            <div class="field">
                {!! Form::open(['route' => ['countries.destroy', $country->id], 'method' => 'delete']) !!}
                    <a href="{!! route('countries.show', [$country->id]) !!}"><i class="iconfont icon-view"></i></a>
                    <!--<a href="{!! route('countries.edit', [$country->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>-->
                    <!--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                {!! Form::close() !!}
            </div>
            <div class="field" id="pais">
                <label>País</label>
                {!! $country->nombre !!}
            </div>
            <div class="field" id="codigo">
                <label>Código</label>
                {!! $country->codigo_ref !!}
            </div>         
        </div>
    @endforeach        
</div>
{!! $countries->appends(Input::except('page'))->render() !!}