<?php

namespace App\Http\Controllers\Admin\Puc;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;
use Response;
use DB;
use App\Models\Admin\Puc\puc_clase;
use App\Models\Admin\Puc\puc_grupo;
use App\Models\Admin\Puc\puc_cuenta;
use App\Models\Admin\Puc\puc_subcuenta;
use App\Models\Admin\Puc\puc_cuentaauxiliar;

class puc_operacionesController extends Controller
{
    private $listClases;

    public function __construct()
    {
        //filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo en el que se desea ejecutar
        $this->beforeFilter('@selection',['only' => ['index','create'] ]);
        
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function selection(){
        //se implementa para los select dinamicos
        //se lista el nombre y el id correspondiente a todas las puc_clase
        $this->listClases =  puc_clase::select(DB::raw("CONCAT(codigo, ' - ', nombre) as nombre, id"))->orderBy('id', 'asc')->lists('nombre','id');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $results ="";
        /*
        if($request != ""){
            $types = config('options.puc_types');

            if($request->get('tipo_cuenta') != "" && isset($types[$request->get('tipo_cuenta')])){
                //$results =$request->get('tipo_cuenta');
            };
        };
        */
        //$tipoCuenta = [1];
        $peticion = 'ajax';
        return view('admin.puc.buscar', ['results' => $results, 'ruta' => 'puc', 'listClases' => $this->listClases]);
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
            $campo='';
            $modelo='';
            switch ($request->cuenta) {
                case "clases":
                    //$campo="id";
                    //$listCuentas =  puc_clase::CodigoNombre($campo,'=',$request->id);
                    break;
                case "grupos":
                    $campo="clase_id";
                    $modelo= new puc_grupo();
                    break;
                case "cuentas":
                    $campo="grupo_id";
                    $modelo= new puc_cuenta();
                    break;
                case "subcuentas":
                    $campo="cuenta_id";
                    $modelo= new puc_subcuenta();
                    break;
                case "cuentasauxiliares":
                    $campo="subcuenta_id";
                    $modelo= new puc_cuentaauxiliar();
                    break;
            }
            $listCuentas =  $modelo::CodigoNombre($campo ."='". $request->id."'");
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
        return view('admin.puc.crear', ['results' => $results, 'listClases' => $this->listClases]);
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
