 <tr>
    {!! Form::open(['route' => ['sucursales.index'], 'method' => 'get']) !!}
    <td>
        <div class="form-group col-sm-6">
            {!! Form::text('nombre', Input::get('nombre'), ['class' => 'form-control text-uppercase']) !!}
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