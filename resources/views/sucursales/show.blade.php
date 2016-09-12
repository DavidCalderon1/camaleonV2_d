@extends('layouts.app')

@section('content')
    @include('sucursales.show_fields')

    <div class="form-group">
           <a href="{!! route('sucursales.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
