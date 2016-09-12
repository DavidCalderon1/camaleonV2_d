@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit City</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($city, ['route' => ['cities.update', $city->id], 'method' => 'patch']) !!}

            @include('cities.fields')

            {!! Form::close() !!}
        </div>
@endsection
