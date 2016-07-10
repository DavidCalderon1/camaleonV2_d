@extends('layouts.principal')

@section('content')
    @include('flash::message')
	<div class="contenedor">
		<div class="contenido">
			<?php 
			if( isset($site) ){
				echo '<div class="title">'. $site .'</div>';
			}
			
			if( isset($contenido) ){
				echo $contenido;
			}
			
			if( !isset($contenido) && !isset($site) ){
				echo 'Laravel 5';
			} 
			?>
		</div>
	</div>
@endsection

@section('styles')
	<link href="{{{ '/assets/css/fonts.css' }}}" rel="stylesheet" type="text/css">
	<style>
		.contenedor {
			text-align: center;
			display: table-cell;
			vertical-align: middle;
			margin: 0;
			padding: 0;
			width: 100%;
			display: table;
			font-weight: 100;
			font-family: 'Lato_default';
		}

		.contenido {
			text-align: center;
			display: inline-block;
		}

		.title {
			font-size: 96px;
		}
	</style>
@endsection