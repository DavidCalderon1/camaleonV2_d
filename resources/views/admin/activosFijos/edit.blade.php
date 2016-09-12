@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit activo_fijo</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($activoFijo, ['route' => ['admin.activosFijos.update', $activoFijo->id], 'method' => 'patch']) !!}

            @include('admin.activosFijos.fields')

            {!! Form::close() !!}
        </div>
@endsection
