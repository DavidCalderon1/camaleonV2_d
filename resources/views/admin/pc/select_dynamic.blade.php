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
    <label id="clase_id" class="selectDynamic form-control">
    	@if( isset($pcCuenta->clase_nombre) && $pcCuenta->clase_nombre != '')
			{{ $pcCuenta->clase_nombre }} 
    	@else
    		Clase
    	@endif
    </label>
    {!! Form::number('clase_id', null, ['class' => 'form-control', 'placeholder' => 'Clase', 'required' ])!!}
    <button data-toggle="modal" data-target="#modal{{$ruta}}" elementId="clases" class="btn btn-default selectDynamic" id="clase_id" title="Seleccione una clase" peticion="ajax" type="button"><i class="glyphicon glyphicon-search"></i> Seleccione una clase</button>
	<?php 
	// se modifican los datos iniciales
	$modalData->id = 'modal'.$ruta;
	$modalData->title = 'Seleccione una clase';

	//array multidimensional para los demas selects
	$lists = json_decode('{"clases":""}');
	$lists->clases = clone $selectData->clases;
	$lists->clases->para = '';
	
	?>
    @include('forms.modal_select', ['modal' => $modalData ])
</div>
@endif

@if($ruta == 'cuentas')
<!-- Grupo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grupo_id', 'Grupo:') !!}
    <label id="grupo_id" class="selectDynamic form-control">
    	@if( isset($pcCuenta->grupo_nombre) && $pcCuenta->grupo_nombre != '')
			{{ $pcCuenta->grupo_nombre }}
    	@else
    		Grupo
    	@endif
    </label>
    {!! Form::number('grupo_id', null, ['class' => 'form-control', 'placeholder' => 'Grupo', 'required' ])!!}
    <button data-toggle="modal" data-target="#modal{{$ruta}}" elementId="grupos" class="btn btn-default selectDynamic" id="grupo_id" title="Seleccione un grupo" peticion="ajax" type="button"><i class="glyphicon glyphicon-search"></i> Seleccione un grupo</button>
	<?php 
	// se modifican los datos iniciales
	$modalData->id = 'modal'.$ruta;
	$modalData->title = 'Seleccione un grupo';

	//array multidimensional para los demas selects
	$lists = json_decode('{"clases":"", "grupos":""}');
	$lists->clases = clone $selectData->clases;
	$lists->grupos = clone $selectData->grupos;
	$lists->grupos->para = '';
	
	?>
    @include('forms.modal_select', ['modal' => $modalData, 'lists' => $lists ])
</div>
@endif

@if($ruta == 'subcuentas')
<!-- Cuenta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuenta_id', 'Cuenta Id:') !!}
    <label id="cuenta_id" class="selectDynamic form-control">
    	@if( isset($pcCuenta->cuenta_nombre) && $pcCuenta->cuenta_nombre != '')
			{{ $pcCuenta->cuenta_nombre }}
    	@else
    		Cuenta
    	@endif
    </label>
    {!! Form::number('cuenta_id', null, ['class' => 'form-control', 'placeholder' => 'Cuenta', 'required' ])!!}
    <button data-toggle="modal" data-target="#modal{{$ruta}}" elementId="cuentas" class="btn btn-default selectDynamic" id="cuenta_id" title="Seleccione una cuenta" peticion="ajax" type="button"><i class="glyphicon glyphicon-search"></i> Seleccione una cuenta</button>
	<?php 
	// se modifican los datos iniciales
	$modalData->id = 'modal'.$ruta;
	$modalData->title = 'Seleccione una cuenta';

	//array multidimensional para los demas selects
	$lists = json_decode('{"clases":"", "grupos":"", "cuentas":""}');
	$lists->clases = clone $selectData->clases;
	$lists->grupos = clone $selectData->grupos;
	$lists->cuentas = clone $selectData->cuentas;
	$lists->cuentas->para = '';
	
	?>
    @include('forms.modal_select', ['modal' => $modalData, 'lists' => $lists ])
</div>
@endif

@if($ruta == 'cuentasauxiliares')
<!-- Subcuenta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subcuenta_id', 'Subcuenta:') !!}
    <label id="subcuenta_id" class="selectDynamic form-control">
    	@if( isset($pcCuenta->subcuenta_nombre) && $pcCuenta->subcuenta_nombre != '')
			{{ $pcCuenta->subcuenta_nombre }}
    	@else
    		Subcuenta
    	@endif
    </label>
    {!! Form::number('subcuenta_id', null, ['class' => 'form-control', 'placeholder' => 'Subcuenta', 'required' ])!!}
    <button data-toggle="modal" data-target="#modal{{$ruta}}" elementId="subcuentas" class="btn btn-default selectDynamic" id="subcuenta_id" title="Seleccione una subcuenta" peticion="ajax" type="button"><i class="glyphicon glyphicon-search"></i> Seleccione una subcuenta</button>
	<?php 
	// se modifican los datos iniciales
	$modalData->id = 'modal'.$ruta;
	$modalData->title = 'Seleccione una subcuenta';

	//array multidimensional para los demas selects
	$lists = json_decode('{"clases":"", "grupos":"", "cuentas":"", "subcuentas":""}');
	$lists->clases = clone $selectData->clases;
	$lists->grupos = clone $selectData->grupos;
	$lists->cuentas = clone $selectData->cuentas;
	$lists->subcuentas = clone $selectData->subcuentas;
	$lists->subcuentas->para = '';
	
	?>
    @include('forms.modal_select', ['modal' => $modalData, 'lists' => $lists ])
</div>
@endif

@if($ruta == 'movimientosContables')
<!-- Subcuenta Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cntaux_id', 'Cuenta auxiliar:') !!}
    <label id="cntaux_id" class="selectDynamic form-control">
    	@if( isset($movimientoContable->cntaux_nombre) && $movimientoContable->cntaux_nombre != '')
			{{ $movimientoContable->cntaux_nombre }}
    	@else
    		Cuenta auxiliar
    	@endif
    </label>
    {!! Form::number('cntaux_id', null, ['class' => 'form-control', 'placeholder' => 'Cuenta auxiliar', 'required' ])!!}
    <button data-toggle="modal" data-target="#modal{{$ruta}}" elementId="cuentasauxiliares" class="btn btn-default selectDynamic" id="cntaux_id" title="Seleccione una cuenta auxiliar" peticion="ajax" type="button"><i class="glyphicon glyphicon-search"></i> Seleccione una cuenta auxiliar</button>
	<?php 
	// se modifican los datos iniciales
	$modalData->id = 'modal'.$ruta;
	$modalData->title = 'Seleccione una cuenta auxiliar';

	//array multidimensional para los demas selects
	$lists = json_decode('{"clases":"", "grupos":"", "cuentas":"", "subcuentas":"", "cuentasauxiliares":""}');
	$lists->clases = clone $selectData->clases;
	$lists->grupos = clone $selectData->grupos;
	$lists->cuentas = clone $selectData->cuentas;
	$lists->subcuentas = clone $selectData->subcuentas;
	$lists->cuentasauxiliares = clone $selectData->cuentasauxiliares;
	$lists->cuentasauxiliares->para = '';
	
	?>
    @include('forms.modal_select', ['modal' => $modalData, 'lists' => $lists ])
</div>
@endif

@if($ruta == 'pc')
<!-- Subcuenta Id Field -->
	<?php 

	//array multidimensional para los demas selects
	$lists = json_decode('{"clases":"", "grupos":"", "cuentas":"", "subcuentas":"", "cuentasauxiliares":""}');
	$lists->clases = clone $selectData->clases;
	$lists->grupos = clone $selectData->grupos;
	$lists->cuentas = clone $selectData->cuentas;
	$lists->subcuentas = clone $selectData->subcuentas;
	$lists->cuentasauxiliares = clone $selectData->cuentasauxiliares;
	$lists->cuentasauxiliares->para = '';
	
	?>
    @include('forms.modal_select', ['lists' => $lists ])
@endif