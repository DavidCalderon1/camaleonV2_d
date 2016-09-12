<table class="table table-responsive" id="sucursales-table">
    <thead>
        <th>Nombre</th>
        <th>Pais</th>
        <th>Departamento</th>
        <th>Ciudad</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
        @include('sucursales.filter')
    @foreach($sucursales as $sucursal)
        <tr>
            <td>{!! $sucursal->nombre !!}</td>
            <td>{!! $sucursal->city->state->country->nombre !!}</td>
            <td>{!! $sucursal->city->state->nombre !!}</td>
            <td>{!! $sucursal->city->nombre !!}</td>
            <td>{!! $sucursal->direccion !!}</td>
            <td>{!! $sucursal->telefono !!}</td>
            <td>
                {!! Form::open(['route' => ['sucursales.destroy', $sucursal->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sucursales.show', [$sucursal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <!-- <a href="{!! route('sucursales.edit', [$sucursal->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}-->
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $sucursales->appends(Input::except('page'))->render() !!}
