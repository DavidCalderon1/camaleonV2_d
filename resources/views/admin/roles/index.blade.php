@extends('layouts.app')
 
@section('content')
        <h1 class="pull-left">{{ $title_page='Editar '.$nombre }}</h1>
        
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('admin.'.$ruta.'.create') !!}">Agregar {{ $nombre }}</a>
 
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('admin.roles.table')
        {!! $datos->render() !!}
@endsection