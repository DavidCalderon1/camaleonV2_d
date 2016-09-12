<table class="table table-responsive" id="states-table">
    <thead>
        <th>Pais</th>
        <th>Departamento</th>
        <th>Codigo Ref</th>
        <th>Action</th>
    </thead>
    <tbody>
        @include('states.filter')
        @foreach($states as $state)
            <tr>
                <td>{!! $state->country->nombre !!}</td>
                <td>{!! $state->nombre !!}</td>
                <td>{!! $state->country->codigo_ref.$state->codigo_ref !!}</td>
                <td>
                    {!! Form::open(['route' => ['states.destroy', $state->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('states.show', [$state->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <!-- <a href="{!! route('states.edit', [$state->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> -->
                        <!-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{!! $states->appends(Input::except('page'))->render() !!}