@extends('layouts.app')

@section('content')
        <h1 class="pull-left">{{ $title_page='Usuarios' }}</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.usuarios.create') !!}">Agregar usuario</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('admin.usuarios.table')
        {!! $users->render() !!}
        
@endsection