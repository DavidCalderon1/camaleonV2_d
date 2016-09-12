<table class="table table-responsive" id="countries-table">
    <thead>
        <th>Pais</th>
        <th>Codigo Ref</th>
        <th>Action</th>
    </thead>
    <tbody>
        @include('countries.filter')
        @foreach($countries as $country)
            <tr>
                <td>{!! $country->nombre !!}</td>
                <td>{!! $country->codigo_ref !!}</td>
                <td>
                    {!! Form::open(['route' => ['countries.destroy', $country->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('countries.show', [$country->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <!--<a href="{!! route('countries.edit', [$country->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>-->
                        <!--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{!! $countries->appends(Input::except('page'))->render() !!}