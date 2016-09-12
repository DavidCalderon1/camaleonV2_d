<table class="table table-responsive" id="personas-table">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tipo Documento</th>
        <th>Documento</th>
        <th>Ciudad Id</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($personas as $persona)
        <tr>
            <td>{!! $persona->nombre !!}</td>
            <td>{!! $persona->apellido !!}</td>
            <td>{!! $persona->tipo_documento !!}</td>
            <td>{!! $persona->documento !!}</td>
            <td>{!! $persona->ciudad_id !!}</td>
            <td>{!! $persona->direccion !!}</td>
            <td>{!! $persona->telefono !!}</td>
            <td>{!! $persona->created_at !!}</td>
            <td>{!! $persona->updated_at !!}</td>
            <td>{!! $persona->deleted_at !!}</td>
            <td>
                {!! Form::open(['route' => ['personas.destroy', $persona->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('personas.show', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('personas.edit', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
