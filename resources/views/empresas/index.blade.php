@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Empresas</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('empresas.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('empresas.table')
        
@endsection
