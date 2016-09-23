@include('states.filter')
<div class="clearfix"></div>

<div class="result">
<h6>RESULTADOS</h6>

    @foreach($states as $state)
        <div class="resultbox">
            <div class="field">
                {!! Form::open(['route' => ['states.destroy', $state->id], 'method' => 'delete']) !!}
                        <a href="{!! route('states.show', [$state->id]) !!}" ><i class="iconfont icon-view"></i></a>
                        <!-- <a href="{!! route('states.edit', [$state->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> -->
                        <!-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    {!! Form::close() !!}
            </div>
            <div class="field" id="pais">
                <label>País</label>
                {!! $state->country->nombre !!}
            </div>
            <div class="field" id="departamento">
                 <label>Departamento</label>
                {!! $state->nombre !!}
            </div>
            <div class="field" id="codigo">
                <label>Código</label>
                {!! $state->country->codigo_ref.$state->codigo_ref !!}
            </div>         
        </div>                   
    @endforeach
</div>
{!! $states->appends(Input::except('page'))->render() !!}

 