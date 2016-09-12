@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit State</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($state, ['route' => ['states.update', $state->id], 'method' => 'patch']) !!}

            @include('states.fields')

            {!! Form::close() !!}
        </div>
@endsection
