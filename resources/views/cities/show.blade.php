@extends('layouts.app')

@section('content')

	@include('flash::message')

    @include('cities.show_fields')

    <div class="form-group">
           <a href="{!! route('cities.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
