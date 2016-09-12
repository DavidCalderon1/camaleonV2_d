@include('terceros.filter')
<table class="table table-responsive" id="terceros-table">
    <thead>
        <th>Tipo</th>
        <th>Nombre/Razon Social</th>
        <th>Documento/Nit</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($terceros as $tercero)
        <tr>
            <td>{!! $tercero->tipo !!}</td>
            @if($tercero->tipo == 'NATURAL')
                <td>{!! $tercero->nombre . ' ' . $tercero->apellido !!}</td>
                <td>{!! $tercero->documento !!}</td>
            @else
                <td>{!! $tercero->razon_social !!}</td>
                <td>{!! $tercero->nit !!}</td>
            @endif
            <td>
                {!! Form::open(['route' => ['terceros.destroy', $tercero->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('terceros.show', [$tercero->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $terceros->appends(Input::except('page'))->render() !!}