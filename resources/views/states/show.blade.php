@extends('layouts.app')

@section('content')
	@include('flash::message')
	
    @include('states.show_fields')

    <div class="form-group">
           <a href="{!! route('states.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
