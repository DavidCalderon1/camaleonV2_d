@extends('layouts.app')

@section('content')
    @include('personas.show_fields')

    <div class="form-group">
           <a href="{!! route('personas.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
