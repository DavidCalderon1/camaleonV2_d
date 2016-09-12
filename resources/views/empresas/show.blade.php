@extends('layouts.app')

@section('content')
    @include('empresas.show_fields')

    <div class="form-group">
           <a href="{!! route('empresas.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
