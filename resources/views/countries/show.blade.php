@extends('layouts.app')

@section('content')

	@include('flash::message')

    @include('countries.show_fields')

    <div class="form-group">
           <a href="{!! route('countries.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
