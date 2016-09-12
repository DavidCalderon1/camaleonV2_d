@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Sucursal</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($sucursal, ['route' => ['sucursales.update', $sucursal->id], 'method' => 'patch']) !!}

            @include('sucursales.fields')

            {!! Form::close() !!}
        </div>
@endsection
