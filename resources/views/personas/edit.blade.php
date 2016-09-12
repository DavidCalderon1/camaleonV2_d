@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Persona</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($persona, ['route' => ['personas.update', $persona->id], 'method' => 'patch']) !!}

            @include('personas.fields')

            {!! Form::close() !!}
        </div>
@endsection
