@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Usuario</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($user, ['route' => ['admin.usuarios.update', $user->id], 'method' => 'patch']) !!}

            @include('admin.usuarios.fields')

            {!! Form::close() !!}
        </div>
@endsection