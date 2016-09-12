@extends('layouts.app')

@section('content')
    @include('admin.activosFijos.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.activosFijos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
