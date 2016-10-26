<?php

namespace App\Http\Controllers\Admin\Pc;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;
use Response;
use DB;
use App\Models\Admin\Pc\pc_clase;
use App\Models\Admin\Pc\pc_grupo;
use App\Models\Admin\Pc\pc_cuenta;
use App\Models\Admin\Pc\pc_subcuenta;
use App\Models\Admin\Pc\pc_cuentaauxiliar;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;
use App\Http\Controllers\Traits\funcionesComunes;

class pc_operacionesController extends Controller
{
    private $listClases;
    private $results;
    private $model;

    public function __construct()
    {
        //filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo en el que se desea ejecutar
        $this->beforeFilter('@setResults',['only' => ['index'] ]);
        
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    /*
    public function selection(){
        //se implementa para los select dinamicos
        //se lista el nombre y el id correspondiente a todas las pc_clase
        $this->listClases =  pc_clase::select(DB::raw("CONCAT(codigo, ' - ', nombre) as nombre, id"))->orderBy('id', 'asc')->lists('nombre','id');
    }
    */

    /**
     * setResults the specified resource in storage.
     *
     * @param  \Illuminate\Routing\Route  $route
     * @param  \Illuminate\Http\Request  $request
     * @return $this->results
     */
    use funcionesComunes;

    public function setResults(Route $route, Request $request)
    {
        $input = $request->all();

        $this->results['nameBuscar'] = 'pcBuscarParam';
        $this->results['nameResult'] = 'results';
        $this->results['result'] = '';
        $request['search_param_data'] = 'tab=parametros';
        $request['search_list_data'] = 'tab=lista';

        //validacion en el caso de que los parametros de busqueda sean de la pestaña 'Parametros'
        if ( array_key_exists('tab', $input) && $input['tab'] == "parametros" && array_key_exists('cuenta_tipo', $input) && array_key_exists('cuenta_busqueda', $input) ) {
            
            $request['search_param_data'] = "";
            $ampersan ='';
            foreach ($input as $key => $value) {
                $request['search_param_data'] = $request['search_param_data'] . $ampersan .$key."=".$value;
                $ampersan ='&';
            }
            
            $this->results['nameBuscar'] = 'pcBuscarParam';
            $this->results['nameResult'] = 'parametros_results';
            $this->results['result'] = '<script> $(document).ready(function(){ $("body").addClass("loading");  setTimeout(function(){ $(".tab-pane.active form").submit(); }, 500); }); </script>';

        //validacion en el caso de que los parametros de busqueda sean de la pestaña 'Lista'
        }elseif ( array_key_exists('tab', $input) && $input['tab'] == "lista"){
            $request['search_list_data'] = "";
            $ampersan ='';
            foreach ($input as $key => $value) {
                $request['search_list_data'] = $request['search_list_data'] . $ampersan .$key."=".$value;
                $ampersan ='&';
            }

            $this->results['nameBuscar'] = 'pcBuscarLista';
            $this->results['nameResult'] = 'lista_results';
            $this->results['result'] = '<script> $(document).ready(function(){ $("body").addClass("loading");  setTimeout(function(){ $(".tab-pane.active form").submit(); }, 500); }); </script>';
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $peticion = 'ajax';
        return view('admin.pc.buscar', ['peticion' => $peticion, $this->results['nameBuscar'] => $request, $this->results['nameResult'] => $this->results['result'], 'ruta' => 'pc']);
    }

    /**
     * Set a model instance of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setModelo($getCuenta, $getModulo)
    {
        $setModelo = '';
        switch ($getCuenta) {
            case "clases":
                $setModelo['campo']="tipo like ";
                $setModelo['modelo']= new pc_clase();
                //$campo="id";
                //$listCuentas =  pc_clase::CodigoNombre($campo,'=',$request->id);
                break;
            case "grupos":
                $setModelo['campo']="clase_id =";
                $setModelo['modelo']= new pc_grupo();
                break;
            case "cuentas":
                $setModelo['campo']="grupo_id =";
                $setModelo['modelo']= new pc_cuenta();
                break;
            case "subcuentas":
                $setModelo['campo']="cuenta_id =";
                $setModelo['modelo']= new pc_subcuenta();
                break;
            case "cuentasauxiliares":
                $setModelo['campo']="subcuenta_id =";
                $setModelo['modelo']= new pc_cuentaauxiliar();
                break;
        }
        if ($getCuenta == 'cuentasauxiliares' && $getModulo == 'movimientosContables') {
            $setModelo['modelo']= $setModelo['modelo']::TerceroActivo();
        }

        return $setModelo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lista(Request $request)
    {
        if ( $request->ajax() ) {
            $listCuentas='';
            $setModelo = $this->setModelo($request->cuenta, $request->modulo);
            $campo = $setModelo['campo'];
            $modelo = $setModelo['modelo'];
            $listCuentas =  $modelo->CodigoNombre($campo ."'". $request->id."'");
            return response()->json($listCuentas);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results ="";
        return view('admin.pc.crear', ['results' => $results]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
