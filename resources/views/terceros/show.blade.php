@extends('layouts.app')

@section('content')
    @include('terceros.show_fields')

    <div class="form-group">
           <a href="{!! route('terceros.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
