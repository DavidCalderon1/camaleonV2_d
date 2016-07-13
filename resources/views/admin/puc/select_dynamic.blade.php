<?php 
	// array para los datos de la ventana modal
	$modalData = '{
		"id":"modalselect",
		"class":"formModalSelect",
		"title":"Seleccione uno",
		"buttonCancel":"Cancelar",
		"buttonConfirm":"Seleccionar"
	}';
	$modalData = json_decode($modalData);	

	//array multidimensional para los selects
	$selectData = '{"clases":
		{"id":"clases",
		"label":"Clase",
		"list":"",
		"para":"grupos",
		"placeholder":"Seleccione una clase"}
	,"grupos":
		{"id":"grupos",
		"label":"Grupo",
		"list":"",
		"para":"cuentas",
		"placeholder":"Seleccione un grupo"}
	,"cuentas":
		{"id":"cuentas",
		"label":"Cuenta",
		"list":"",
		"para":"subcuentas",
		"placeholder":"Seleccione una cuenta"}
	,"subcuentas":
		{"id":"subcuentas",
		"label":"Subcuenta",
		"list":"",
		"para":"cuentasauxiliares",
		"placeholder":"Seleccione una subcuenta"}
	,"cuentasauxiliares":
		{"id":"cuentasauxiliares",
		"label":"Cuenta auxiliar",
		"list":"",
		"para":"",
		"placeholder":"Seleccione una cuenta auxiliar"}
	}';
	$selectData = json_decode($selectData);

	// array para los datos del primer select
	$selectData->clases->list = (isset($listClases))? $listClases : '';
?>

@if($ruta == 'grupos')
<!-- Clase Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clase_id', 'Clase:') !!}
    <label id="clase_id" class="selectDynamic form-control">Clase</label>
    {!! Form::number('clase_id', null, ['class' => 'form-control', 'placeholder' => 'Clase', 'required' ])!!}
    <button data-toggle="modal" data-target="#modal{{$ruta}}" elementId="clases" class="btn btn-default selectDynamic" id="clase_id" title="Seleccione una clase" peticion="ajax" type="button"><i class="glyphicon glyphicon-search"></i> Seleccione una clase</button>
	<?php 
	// se modifican los datos iniciales
	$modalData->id = 'modal'.$ruta;
	$modalData->title = 'Seleccione una clase';
	$selectData->clases->para = '';
	
	?>
    @include('forms.modal_select', ['modal' => $modalData, 'first_select' => $selectData->clases ])
</div>
@endif

@if($ruta == 'cuentas')
<!-- Grupo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grupo_id', 'Grupo:') !!}
    <label id="grupo_id" class="selectDynamic form-control">Grupo</label>
    {!! Form::number('grupo_id', null, ['class' => 'form-control', 'placeholder' => 'Grupo', 'required' ])!!}
    <button data-toggle="modal" data-target="#modal{{$ruta}}" elementId="grupos" class="btn btn-default selectDynamic" id="grupo_id" title="Seleccione un grupo" peticion="ajax" type="button"><i class="glyphicon glyphicon-search"></i> Seleccione un grupo</button>
	<?php 
	// se modifican los datos iniciales
	$modalData->id = 'modal'.$ruta;
	$modalData->title = 'Seleccione un grupo';

	//array multidimensional para los demas selects
	$lists = json_decode('{"grupos":""}');
	$lists->grupos = clone $selectData->grupos;
	$lists->grupos->para = '';
	
	?>
    @include('forms.modal_select', ['modal' => $modalData, 'first_select' => $selectData->clases, 'lists' => $lists ])
</div>
@endif

@if($ruta == 'subcuentas')
<!-- Cuenta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuenta_id', 'Cuenta Id:') !!}
    <label id="cuenta_id" class="selectDynamic form-control">Cuenta</label>
    {!! Form::number('cuenta_id', null, ['class' => 'form-control', 'placeholder' => 'Cuenta', 'required' ])!!}
    <button data-toggle="modal" data-target="#modal{{$ruta}}" elementId="cuentas" class="btn btn-default selectDynamic" id="cuenta_id" title="Seleccione una cuenta" peticion="ajax" type="button"><i class="glyphicon glyphicon-search"></i> Seleccione una cuenta</button>
	<?php 
	// se modifican los datos iniciales
	$modalData->id = 'modal'.$ruta;
	$modalData->title = 'Seleccione una cuenta';

	//array multidimensional para los demas selects
	$lists = json_decode('{"grupos":"", "cuentas":""}');
	$lists->grupos = clone $selectData->grupos;
	$lists->cuentas = clone $selectData->cuentas;
	$lists->cuentas->para = '';
	
	?>
    @include('forms.modal_select', ['modal' => $modalData, 'first_select' => $selectData->clases, 'lists' => $lists ])
</div>
@endif

@if($ruta == 'cuentasauxiliares')
<!-- Subcuenta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subcuenta_id', 'Subcuenta:') !!}
    <label id="subcuenta_id" class="selectDynamic form-control">Subcuenta</label>
    {!! Form::number('subcuenta_id', null, ['class' => 'form-control', 'placeholder' => 'Subcuenta', 'required' ])!!}
    <button data-toggle="modal" data-target="#modal{{$ruta}}" elementId="subcuentas" class="btn btn-default selectDynamic" id="subcuenta_id" title="Seleccione una subcuenta" peticion="ajax" type="button"><i class="glyphicon glyphicon-search"></i> Seleccione una subcuenta</button>
	<?php 
	// se modifican los datos iniciales
	$modalData->id = 'modal'.$ruta;
	$modalData->title = 'Seleccione una subcuenta';

	//array multidimensional para los demas selects
	$lists = json_decode('{"grupos":"", "cuentas":"", "subcuentas":""}');
	$lists->grupos = clone $selectData->grupos;
	$lists->cuentas = clone $selectData->cuentas;
	$lists->subcuentas = clone $selectData->subcuentas;
	$lists->subcuentas->para = '';
	
	?>
    @include('forms.modal_select', ['modal' => $modalData, 'first_select' => $selectData->clases, 'lists' => $lists ])
</div>
@endif

@if($ruta == 'puc')
<!-- Subcuenta Id Field -->
	<?php 

	//array multidimensional para los demas selects
	$lists = json_decode('{"grupos":"", "cuentas":"", "subcuentas":"", "cuentasauxiliares":""}');
	$lists->grupos = clone $selectData->grupos;
	$lists->cuentas = clone $selectData->cuentas;
	$lists->subcuentas = clone $selectData->subcuentas;
	$lists->cuentasauxiliares = clone $selectData->cuentasauxiliares;
	$lists->cuentasauxiliares->para = '';
	
	?>
    @include('forms.modal_select', ['first_select' => $selectData->clases, 'lists' => $lists ])
@endif