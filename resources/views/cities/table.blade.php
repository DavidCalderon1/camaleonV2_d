<table class="table table-responsive" id="cities-table">
    <thead>
        <th>Pais</th>
        <th>Departamento</th>
        <th>Ciudad</th>
        <th>Codigo Ref</th>
        <th>Action</th>
    </thead>
    <tbody>
        @include('cities.filter')
        @foreach($cities as $city)
            <tr>
                <td>{!! $city->state->country->nombre !!}</td>
                <td>{!! $city->state->nombre !!}</td>
                <td>{!! $city->nombre !!}</td>
                <td>{!! $city->state->country->codigo_ref.$city->state->codigo_ref.$city->codigo_ref !!}</td>
                <td>
                    {!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('cities.show', [$city->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <!-- <a href="{!! route('cities.edit', [$city->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> -->
                        <!-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{!! $cities->appends(Input::except('page'))->render() !!}