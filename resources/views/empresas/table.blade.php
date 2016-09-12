<table class="table table-responsive" id="empresas-table">
    <thead>
        <th>Nit</th>
        <th>Razon Social</th>
        <th>Naturaleza</th>
        <th>Fecha Constitucion</th>
        <th>Ciudad Id</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($empresas as $empresa)
        <tr>
            <td>{!! $empresa->nit !!}</td>
            <td>{!! $empresa->razon_social !!}</td>
            <td>{!! $empresa->naturaleza !!}</td>
            <td>{!! $empresa->fecha_constitucion !!}</td>
            <td>{!! $empresa->ciudad_id !!}</td>
            <td>{!! $empresa->direccion !!}</td>
            <td>{!! $empresa->telefono !!}</td>
            <td>{!! $empresa->created_at !!}</td>
            <td>{!! $empresa->updated_at !!}</td>
            <td>{!! $empresa->deleted_at !!}</td>
            <td>
                {!! Form::open(['route' => ['empresas.destroy', $empresa->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('empresas.show', [$empresa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('empresas.edit', [$empresa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
