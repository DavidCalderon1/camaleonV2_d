@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">{{ $title_page='Crear '.$nombre }}</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'admin.'.$ruta.'.store']) !!}

            @include('admin.roles.fields')

        {!! Form::close() !!}
    </div>
@endsection