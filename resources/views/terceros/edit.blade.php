@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Tercero</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tercero, ['route' => ['terceros.update', $tercero->id], 'method' => 'patch']) !!}

            @include('terceros.fields')

            {!! Form::close() !!}
        </div>
@endsection
