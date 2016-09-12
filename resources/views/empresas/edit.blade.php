@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Empresa</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($empresa, ['route' => ['empresas.update', $empresa->id], 'method' => 'patch']) !!}

            @include('empresas.fields')

            {!! Form::close() !!}
        </div>
@endsection
