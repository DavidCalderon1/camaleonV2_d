<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Admin\Createmovimiento_contableRequest;
use App\Http\Requests\Admin\Updatemovimiento_contableRequest;
use App\Repositories\Admin\movimiento_contableRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use DB;
use App\Models\Admin\transaccion;
use App\Models\Admin\movimiento_contable;
use App\Models\Tercero;
use App\Models\Admin\activo_fijo;
use App\Models\Sucursal;

// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

class movimiento_contableController extends InfyOmBaseController
{
    /** @var  movimiento_contableRepository */
    //private $movimientoContableRepository;
    private $datosTransaccion;
    private $listSucursal;
    private $listTerceroActivo;
    private $movimientoContable;
    private $terceros;
    private $activosFijos;
    private $peticion;

    public function __construct(movimiento_contable $movimiento_contable, Request $request)
    {
        $this->movimientoContable = $movimiento_contable;
        //filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo en el que se desea ejecutar
        $this->beforeFilter('@find',['only' => ['destroy'] ]);
        $this->beforeFilter('@findTodoMovimiento',['only' => ['show','edit','update'] ]);
        $this->beforeFilter('@findTransaccion',['only' => ['create'] ]);
        //$this->beforeFilter('@validaAuto',['only' => ['update','destroy'] ]);
        $this->beforeFilter('@mayusculas',['only' => ['store','update'] ]);
        $this->beforeFilter('@findTerceroActivo',['only' => ['store','update'] ]);
        $this->beforeFilter('@selection',['only' => ['create','edit'] ]);
        $this->beforeFilter('@TerceroActivo',['only' => ['edit'] ]);
        $this->peticion = "normal";
        //va a mostrar la vista 'tables' en el caso de ser una peticion de tipo ajax
        if ($request->ajax() || $request->peticion == "ajax") {
            $this->peticion = "ajax";
        }
    }
    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function find(Route $route){
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso son 'transacciones' y 'movimientosContables' el configurado en las rutas y el que esta en la url
        $this->movimientoContable = $this->movimientoContable::Buscar( intval( $route->getParameter('movimientosContables') ) , intval( $route->getParameter('transacciones') ) );
        $this->movimientoContable = $this->movimientoContable->where('movimiento_contable.auto',false);
        $this->movimientoContable = $this->movimientoContable->firstOrFail();
    }
    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function findTodoMovimiento(Route $route, Request $request){
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso son 'transacciones' y 'movimientosContables' el configurado en las rutas y el que esta en la url
        $this->movimientoContable = $this->movimientoContable::ListaMovimientos( intval( $route->getParameter('transacciones') ), intval( $route->getParameter('movimientosContables') ) );
        $action = explode('@', $route->getActionName());
        
        if( in_array ($action[1], ['edit','update'] ) ){
            $this->movimientoContable = $this->movimientoContable->where('movimiento_contable.auto',false);
        }
        $this->movimientoContable = $this->movimientoContable->firstOrFail();
    }
    //metodo mayusculas ejecutado por el metodo beforeFilter dentro del constructor para colocar en mayusculas cada dato
    public function mayusculas(Route $route, Request $request){
        //va a obtener los datos recibidos eceptuando algunos, por ejemplo la descripcion la cual no se debe pasar a mayusculas
        $input = $request->except(['_method','_token','urlDestino','TerceroActivo','detalle']);
        foreach ($input as $key => $value) {
            $request[$key] = strtoupper($value);
        }
    }

    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function findTransaccion(Route $route){
        $this->datosTransaccion = transaccion::IdFechaTipo( intval( $route->getParameter('transacciones') ) )->firstOrFail();
    }

    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function findTerceroActivo(Route $route, Request $request){
        if($request->input('TER_ACT') == 'TERCERO'){
            //busca los registros recibidos
            $this->terceros = Tercero::find($request->input('TerceroActivo'));
        }elseif($request->input('TER_ACT') == 'ACTIVO'){
            //busca los registros recibidos
            $this->activosFijos = activo_fijo::find($request->input('TerceroActivo'));
        }
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function selection(Route $route){

        //se lista el nombre y el id correspondiente a todos los sucursal
        $this->listSucursal =  Sucursal::select(DB::raw("CONCAT(id, ' - ', nombre) as nombre, id"))->orderBy('id', 'asc')->lists('nombre','id');
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function TerceroActivo(){
        if(count($this->movimientoContable->tercero)>0 ){
            //se asigna este valor para que quede seleccionado el radio button con el nombre TERCERO
            $this->movimientoContable['TER_ACT'] = 'TERCERO';
            //se lista el nombre y el id correspondiente a todos los terceros
            $this->listTerceroActivo =  Tercero::ListaTerceros()->lists('nombre', 'id');
        }elseif(count($this->movimientoContable->activo_fijo)>0 ){
            //se asigna este valor para que quede seleccionado el radio button con el nombre ACTIVO FIJO
            $this->movimientoContable['TER_ACT'] = 'ACTIVO';
            //se lista el nombre y el id correspondiente a todos los ActivosFijos
            $this->listTerceroActivo =  activo_fijo::ListaActivosFijos()->lists('nombre', 'id');
        }
    }

    /**
     * Display a listing of the movimiento_contable.
     *
     * @param Request $request
     * @return Response
     */
    public function index($transaccionId, Request $request)
    {
        $vista = 'admin.movimientosContables.index';
        if( $request->ajax() ){
            $vista = 'admin.movimientosContables.table';
        }
        if($request->tipo){
        //if($request->busqueda){

            $filtrosMovimiento = ["SUCURSAL" => ["suc.id","="], "DETALLE" => ["movimiento_contable.detalle","LIKE"], "CUENTAAUXILIAR" => ["cntaux.id","="], "TERCERO" => ["tercero.id","="], "ACTIVO" => ["af.id","="], "DEBE" => ["CAST(movimiento_contable.debe as varchar(255) )","LIKE"], "HABER" => ["CAST(movimiento_contable.haber as varchar(255) )","LIKE"] ];
            $condiciones= null;

            if ( isset($request->tipo) && array_key_exists($request->tipo, $filtrosMovimiento) ) {
                //$condiciones = "CAST(" .$filtrosMovimiento[$request->tipo][0]. " AS varchar(255) ) " .$filtrosMovimiento[$request->tipo][1];
                $condiciones[0] = $filtrosMovimiento[$request->tipo][0];
                $condiciones[1] = $filtrosMovimiento[$request->tipo][1];
                if ($condiciones[1] == "LIKE") {
                    $condiciones[2] = "%". $request->busqueda ."%";
                }else{
                    $condiciones[2] = $request->busqueda;
                }
            }

            $this->movimientoContable = $this->movimientoContable::ListaMovimientos($transaccionId,'','',$condiciones)->paginate(4);

            // guarda un mensaje en el archivo de log
            if( count($this->movimientoContable) == 0 ){
            // guarda un mensaje en el archivo de log
                Log::info('movimientosContables, Index, busqueda de movimientos contables sin resultados: '.$request->fullUrl() );
            }else{
            // guarda un mensaje en el archivo de log
                Log::info('movimientosContables, Index, Mostrando resultado de busqueda de movimientos contables: '.$request->fullUrl() );
            }

            return view($vista, ['peticion' => $this->peticion, 'ruta' => 'movimientosContables', 'nombre' => 'movimiento contable', 'movimientoContables' => $this->movimientoContable, 'transaccion' => $transaccionId]);
        }

        $vista = "admin.movimientosContables.index";

        //$this->movimientoContableRepository->pushCriteria(new RequestCriteria($request));
        //$movimientoContables = $this->movimientoContableRepository;
        $movimientoContables = $this->movimientoContable::ListaMovimientos($transaccionId);
        
        // guarda un mensaje en el archivo de log
        if( count($movimientoContables) == 0 ){
            Log::info('movimientosContables, Index, Lista de movimientos contables sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('movimientosContables, Index, Mostrando lista de movimientos contables: '.$request->fullUrl() );
        }
		
        $movimientoContables = $movimientoContables->orderBy('movimiento_contable.id', 'asc')->paginate(4);
		
        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'movimientosContables', 'nombre' => 'movimiento contable', 'movimientoContables' => $movimientoContables, 'transaccion' => $transaccionId]);
    }

    /**
     * Display a listing of terceros o activos.
     *
     * @param Request $request
     * @return Response
     */
    public function lista($transaccionId, Request $request)
    {
        // valida que la peticion sea de tipo ajax
        if ( $request->ajax() ) {
            
            $filtrosMovimiento = ["SUCURSAL" => ["DISTINCT suc.id AS id, suc.nombre AS nombre","suc.id"], "CUENTAAUXILIAR" => ["DISTINCT cntaux.id AS id, CONCAT(cntaux.codigo ,' - ', cntaux.nombre) AS nombre", "cntaux.id"], "TERCERO" => ["DISTINCT tercero.id AS id, CONCAT(empresa.nit, persona.documento ,' - ', empresa.razon_social, persona.nombre, ' ', persona.apellido) AS nombre","tercero.id"], "ACTIVO" => ["DISTINCT af.id, CONCAT(af.marca, ' - ', af.modelo) AS nombre","af.id"] ];
            if ( isset($request->listas) && array_key_exists($request->listas, $filtrosMovimiento) ) {
                $this->movimientoContable = $this->movimientoContable::ListaMovimientos($transaccionId,'',$filtrosMovimiento[$request->listas][0],null,$filtrosMovimiento[$request->listas][1])->get();
                return response()->json($this->movimientoContable);
            }
        
            if( isset($request->TERCERO) ){
                // guarda un mensaje en el archivo de log
                Log::info('movimientosContables, lista, Devolviendo lista de terceros: '.$request->fullUrl() );
                //se lista el nombre y el id correspondiente a todos los terceros
                $this->listTerceroActivo =  Tercero::ListaTerceros()->get();
            }elseif( isset($request->ACTIVO) ){
                // guarda un mensaje en el archivo de log
                Log::info('movimientosContables, lista, Devolviendo lista de activos fijos: '.$request->fullUrl() );
                //se lista el nombre y el id correspondiente a todos los ActivosFijos
                $this->listTerceroActivo =  activo_fijo::ListaActivosFijos()->get();
            }
            return response()->json($this->listTerceroActivo);
        }
    }

    /**
     * Show the form for creating a new movimiento_contable.
     *
     * @return Response
     */
    public function create($transaccionId, Request $request)
    {
        $this->datosTransaccion['trs_id'] = $transaccionId;

        // guarda un mensaje en el archivo de log
        Log::info('movimientosContables, Create, Mostrando formulario de creación de movimientos contables');
        return view('admin.movimientosContables.create', ['peticion' => $this->peticion, 'ruta' => 'movimientosContables', 'nombre' => 'movimiento contable', 'listSucursal' => $this->listSucursal, 'accion' => 'create', 'movimientoContable' => $this->datosTransaccion]);
    }

    /**
     * Store a newly created movimiento_contable in storage.
     *
     * @param Createmovimiento_contableRequest $request
     *
     * @return Response
     */
    public function store(Createmovimiento_contableRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'TER_ACT' => 'required',
            'TerceroActivo' => 'required'
        ]);

        $input = $request->all();
        
        $this->movimientoContable = $this->movimientoContable->create($input);

        if($request->input('TER_ACT') == 'TERCERO' && count($this->terceros) > 0 ){
            //crea los registros para las relaciones de los terceros
            $this->movimientoContable->tercero()->sync($this->terceros);
        }elseif($request->input('TER_ACT') == 'ACTIVO' && count($this->activosFijos) > 0){
            //crea los registros para las relaciones de los activos fijos
            $this->movimientoContable->activo_fijo()->sync($this->activosFijos);
        }else{

        }

        // guarda un mensaje en el archivo de log
        Log::info('movimientosContables, Store, Se almaceno el movimiento contable: '.$this->movimientoContable->id, [$input]);

        Flash::success('Movimiento contable almacenado correctamente.');

        //return redirect(route('admin.transacciones.movimientosContables.show',['transaccionId' => $this->movimientoContable->trs_id, 'id' => $this->movimientoContable->id ]) );
        return redirect(route('admin.transacciones.show',['id' => $this->movimientoContable->trs_id ]) );
        
    }

    /**
     * Display the specified movimiento_contable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($transaccionId, $id)
    {
        
        if (empty($this->movimientoContable)) {
            Flash::error('Movimiento contable no encontrado');
            // guarda un mensaje en el archivo de log
            Log::notice('movimientosContables, Show, Movimiento contable no encontrado, id: '.$id);

            return redirect(route('admin.transacciones.movimientosContables.index', ['transacciones' => $transaccionId] ));
        }
        //valida si tiene activos fijos o terceros y los agrega en una variable llamada terceroActivo
        if(count($this->movimientoContable->tercero)>0 ){
            //$this->movimientoContable['terceroActivo'] = $this->movimientoContable->tercero;
            $terceroId = '';
            foreach($this->movimientoContable->tercero as $terceroData){
                $terceroId = $terceroData->id;
            }
            $this->movimientoContable['terceroActivo'] = Tercero::ListaTerceros()->where('tercero.id',$terceroId)->get();

        }elseif(count($this->movimientoContable->activo_fijo)>0 ){
            $this->movimientoContable['terceroActivo'] = $this->movimientoContable->activo_fijo;
        }

        // guarda un mensaje en el archivo de log
        Log::info('movimientosContables, Show, Mostrando movimiento contable, id: '.$id);

        return view('admin.movimientosContables.show', ['peticion' => $this->peticion, 'ruta' => 'movimientosContables', 'nombre' => 'movimiento contable', 'movimientoContable' => $this->movimientoContable]);
    }

    /**
     * Show the form for editing the specified movimiento_contable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($transaccionId, $id)
    {
        if (empty($this->movimientoContable)) {
            Flash::error('Movimiento contable no encontrado');
            // guarda un mensaje en el archivo de log
            Log::notice('movimientosContables, Edit, Movimiento contable no encontrado: '.$id);

            return redirect(route('admin.transacciones.movimientosContables.index', ['transacciones' => $transaccionId] ));
        }
        //agrega el nombre de la cuenta auxiliar
        $this->movimientoContable['cuenta_fk_nombre'] = $this->movimientoContable->pc_cuentaauxiliar->codigo . ' - ' . $this->movimientoContable->pc_cuentaauxiliar->nombre;

        // guarda un mensaje en el archivo de log
        Log::info('movimientosContables, Edit, Mostrando edición de movimiento contable: '.$id);

        return view('admin.movimientosContables.edit', ['peticion' => $this->peticion, 'ruta' => 'movimientosContables', 'nombre' => 'movimiento contable', 'movimientoContable' => $this->movimientoContable, 'listSucursal' => $this->listSucursal, 'listTerceroActivo' => $this->listTerceroActivo, 'accion' => 'edit']);

    }

    /**
     * Update the specified movimiento_contable in storage.
     *
     * @param  int              $id
     * @param Updatemovimiento_contableRequest $request
     *
     * @return Response
     */
    public function update($transaccionId, $id, Updatemovimiento_contableRequest $request)
    {
        
        if (empty($this->movimientoContable)) {
            Flash::error('Movimiento contable no encontrado');
            // guarda un mensaje en el archivo de log
            Log::notice('movimientosContables, Update, Movimiento contable no encontrado: '.$id);

            return redirect(route('admin.transacciones.movimientosContables.index', ['transacciones' => $transaccionId] ));
        }

        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'TER_ACT' => 'required',
            'TerceroActivo' => 'required'
        ]);

        if($request->input('TER_ACT') == 'TERCERO'){
            //crea o elimina los registros para las relaciones de los terceros
            $this->movimientoContable->activo_fijo()->sync([]);
            //crea los registros para las relaciones de los terceros
            $this->movimientoContable->tercero()->sync($this->terceros);
        }elseif($request->input('TER_ACT') == 'ACTIVO'){
            //crea o elimina los registros para las relaciones de los terceros
            $this->movimientoContable->tercero()->sync([]);
            //crea o elimina los registros para las relaciones de los activos fijos
            $this->movimientoContable->activo_fijo()->sync($this->activosFijos);
        }
        
        $this->movimientoContable = $this->movimientoContable->update($request->all(), $id);

        Flash::success('Movimiento contable actualizado correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('movimientosContables, Update, Movimiento contable actualizado correctamente: '.$id, [$request->all()]);

        //return redirect(route('admin.transacciones.movimientosContables.show',['transacciones' => $transaccionId, 'id' => $this->movimientoContable->id ]) );
        return redirect(route('admin.transacciones.show',['id' => $transaccionId ]) );
    }

    /**
     * Remove the specified movimiento_contable from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($transaccionId, $id)
    {
        if (empty($this->movimientoContable)) {
            Flash::error('Movimiento contable no encontrado');
            // guarda un mensaje en el archivo de log
            Log::notice('movimientosContables, Destroy, Movimiento contable no encontrado: '.$id);

            return redirect(route('admin.transacciones.movimientosContables.index', ['transacciones' => $transaccionId] ));
        }

        $this->movimientoContable->delete($id);

        Flash::success('Movimiento contable eliminado correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('movimientosContables, Destroy, Movimiento contable eliminado correctamente: '.$id);

        return redirect(route('admin.transacciones.movimientosContables.index', ['transacciones' => $transaccionId] ));
    }
}
