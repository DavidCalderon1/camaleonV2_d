<?php 
	
namespace App\Http\Controllers\Traits;

class PcSelectParametros{

	public $selectData ='';
	public $modalData ='';
	public $prevKey ='';

	public function __construct(){
		// array para los datos de la ventana modal
		$this->modalData = '{
			"id":"modalselect",
			"class":"formModalSelect",
			"title":"Seleccione uno",
			"buttonCancel":"Cancelar",
			"buttonConfirm":"Seleccionar"
		}';
		$this->modalData = json_decode($this->modalData);

		//array multidimensional para los selects, contiene los parametros para la configuracion del funcionamiento y presentacion
		$this->selectData = '{"clases":
			{"id":"clases",
			"fkId":"",
			"fkNombre":"",
			"prevKey":"",
			"label":"Clase",
			"list":"",
			"para":"grupos",
			"modal":"si",
			"placeholder":"Seleccione una clase"}
		,"grupos":
			{"id":"grupos",
			"fkId":"clase_id",
			"fkNombre":"Clase",
			"prevKey":"clases",
			"label":"Grupo",
			"list":"",
			"para":"cuentas",
			"modal":"si",
			"placeholder":"Seleccione un grupo"}
		,"cuentas":
			{"id":"cuentas",
			"fkId":"grupo_id",
			"fkNombre":"Grupo",
			"prevKey":"grupos",
			"label":"Cuenta",
			"list":"",
			"para":"subcuentas",
			"modal":"si",
			"placeholder":"Seleccione una cuenta"}
		,"subcuentas":
			{"id":"subcuentas",
			"fkId":"cuenta_id",
			"fkNombre":"Cuenta",
			"prevKey":"cuentas",
			"label":"Subcuenta",
			"list":"",
			"para":"cuentasauxiliares",
			"modal":"si",
			"placeholder":"Seleccione una subcuenta"}
		,"cuentasauxiliares":
			{"id":"cuentasauxiliares",
			"fkId":"subcuenta_id",
			"fkNombre":"Subcuenta",
			"prevKey":"subcuentas",
			"label":"Cuenta auxiliar",
			"list":"",
			"para":"",
			"modal":"si",
			"placeholder":"Seleccione una cuenta auxiliar"}
		,"movimientosContables":
			{"id":"movimientosContables",
			"fkId":"cntaux_id",
			"fkNombre":"Cuenta auxiliar",
			"prevKey":"cuentasauxiliares",
			"label":"Movimiento contable",
			"list":"",
			"para":"",
			"modal":"si",
			"placeholder":"Seleccione un movimiento contable"}
		,"pc":
			{"id":"planCuentas",
			"fkId":"subcuenta_id",
			"fkNombre":"Subcuenta",
			"prevKey":"subcuentas",
			"label":"Plan de cuentas",
			"list":"",
			"para":"",
			"modal":"no",
			"placeholder":"Seleccione una cuenta"}
		}';
		$this->selectData = json_decode($this->selectData);
	}

	public function selectedData($ruta){
		//guarda la llave del elemento anterior del array, ejm. si el actual es grupos guarda la llave de clases
		$prevKey = '';
		//se eliminan los elementos que no se usaran y deja los elementos hasta la ruta actual
		$remover = false;
		foreach ($this->selectData as $key => $value) {
		    
		    if( $remover ){
		    	unset($this->selectData->$key);
		    }
		    if ($ruta == $key) {
		        $remover = true;
		        $prevKey = $this->selectData->$key->prevKey;
		        //el indice 'para' guarda el id del select siguiente que se cargara con la respuesta a partir del elemento seleccionado
		        if($this->prevKey != ''){
		        	$this->selectData->$prevKey->para = '';
		        }
		    }
		}

		return $this->selectData;
	}	

	public function modalWindowData($ruta,$prevKey){

		// se modifican los datos iniciales de la ventana modal
		$this->modalData->id = 'modal'.$ruta;
		if($prevKey != ''){
			$this->modalData->title = $this->selectData->$prevKey->placeholder;
		}

	    return $this->modalData;
	}	

	public function removerElementosExtra($selectData, $prevKey){		
		//elimina los elementos que no se usaran
		$remover = false;
		foreach ($selectData as $key => $value) {
		    if( $remover ){
		    	unset($selectData->$key);
		    }
		    if ($key == $prevKey) {
		        $remover = true;

		    }
		}
		$selectData->$prevKey->para = '';
		//array multidimensional para armar los demas selects
		$lists = $selectData;
		return $lists;
	}
}

?>