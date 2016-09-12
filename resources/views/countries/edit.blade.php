@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Country</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($country, ['route' => ['countries.update', $country->id], 'method' => 'patch']) !!}

            @include('countries.fields')

            {!! Form::close() !!}
        </div>
@endsection
