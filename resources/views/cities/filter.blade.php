 <tr>
    {!! Form::open(['route' => ['cities.index'], 'method' => 'get']) !!}
    <td>
        <div class="form-group col-sm-6">
            {!! Form::text('country', Input::get('country'), ['class' => 'form-control text-uppercase']) !!}
        </div>
    </td>
    <td>
        <div class="form-group col-sm-6">
            {!! Form::text('state', Input::get('state'), ['class' => 'form-control text-uppercase']) !!}
        </div>
    </td>
    <td>
        <div class="form-group col-sm-6">
            {!! Form::text('city', Input::get('city'), ['class' => 'form-control text-uppercase']) !!}
        </div>
    </td>
    <td>
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Filtrar', ['class' => 'btn btn-primary']) !!}
        </div>
    </td>
    {!! Form::close() !!}
</tr>