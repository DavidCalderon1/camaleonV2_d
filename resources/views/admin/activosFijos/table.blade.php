<table class="table table-responsive" id="activosFijos-table">
    <thead>
        <th>Cuenta Aux Id</th>
        <th>Descripcion</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Fecha Adquisicion</th>
        <th>Valor Compra</th>
        <th>Cantidad</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($activosFijos as $activoFijo)
        <tr>
            <td>{!! $activoFijo->cuenta_aux_id !!}</td>
            <td>{!! $activoFijo->descripcion !!}</td>
            <td>{!! $activoFijo->marca !!}</td>
            <td>{!! $activoFijo->modelo !!}</td>
            <td>{!! $activoFijo->fecha_adquisicion !!}</td>
            <td>{!! $activoFijo->valor_compra !!}</td>
            <td>{!! $activoFijo->cantidad !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.activosFijos.destroy', $activoFijo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.activosFijos.show', [$activoFijo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.activosFijos.edit', [$activoFijo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
