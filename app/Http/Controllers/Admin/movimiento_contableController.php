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
use App\Models\Tercero;
use App\Models\Admin\activo_fijo;
use App\Models\Sucursal;

// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

class movimiento_contableController extends InfyOmBaseController
{
    /** @var  movimiento_contableRepository */
    private $movimientoContableRepository;
    private $listTransaccion;
    private $listSucursal;
    private $listTerceroActivo;
    private $movimientoContable;
    private $terceros;
    private $activosFijos;
    private $peticion;

    public function __construct(movimiento_contableRepository $movimientoContableRepo, Request $request)
    {
        $this->movimientoContableRepository = $movimientoContableRepo;
        //filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo en el que se desea ejecutar
        $this->beforeFilter('@find',['only' => ['edit','show','update','destroy'] ]);
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
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso es 'movimientosContables' el configurado en las rutas
        $this->movimientoContable = $this->movimientoContableRepository->findWithoutFail( intval( $route->getParameter('movimientosContables') ) );
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
    public function selection(){

        //se lista la fecha y el id correspondiente a todas las transacciones
        $this->listTransaccion =  transaccion::IdFechaTipo()->lists('tipo','id');

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
    public function index(Request $request)
    {
        $this->movimientoContableRepository->pushCriteria(new RequestCriteria($request));
        $movimientoContables = $this->movimientoContableRepository;
        $vista = "admin.movimientosContables.index";
        // guarda un mensaje en el archivo de log
        if( count($movimientoContables) == 0 ){
            Log::info('movimientosContables, Index, Lista de movimientos contables sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('movimientosContables, Index, Mostrando lista de movimientos contables: '.$request->fullUrl() );
        }
        $movimientoContables = $movimientoContables->orderBy('id', 'asc')->paginate(15);

        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'movimientosContables', 'nombre' => 'movimiento contable', 'movimientoContables' => $movimientoContables]);
    }

    /**
     * Display a listing of terceros o activos.
     *
     * @param Request $request
     * @return Response
     */
    public function lista(Request $request)
    {
        // valida que la peticion sea de tipo ajax
        if ( $request->ajax() ) {
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
    public function create(Request $request)
    {
        $this->movimientoContable = '';
        if(isset($request->transaccion)){
            $this->movimientoContable['trs_id'] = $request->transaccion;
        }

        // guarda un mensaje en el archivo de log
        Log::info('movimientosContables, Create, Mostrando formulario de creación de movimientos contables');
        return view('admin.movimientosContables.create', ['peticion' => $this->peticion, 'ruta' => 'movimientosContables', 'nombre' => 'movimiento contable', 'listTransaccion' => $this->listTransaccion, 'listSucursal' => $this->listSucursal, 'listTerceroActivo' => $this->listTerceroActivo, 'accion' => 'create', 'movimientoContable' => $this->movimientoContable]);
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
        $input = $request->all();

        $this->movimientoContable = $this->movimientoContableRepository->create($input);
        
        if($input->TER_ACT == 'TERCERO'){
            //crea los registros para las relaciones de los terceros
            $this->movimientoContable->tercero()->sync($this->terceros);
        }elseif($input->TER_ACT == 'ACTIVO'){
            //crea los registros para las relaciones de los activos fijos
            $this->movimientoContable->activo_fijo()->sync($this->activosFijos);
        }

        // guarda un mensaje en el archivo de log
        Log::info('movimientosContables, Store, Se almaceno el movimiento contable: '.$this->movimientoContable->id, [$input]);

        Flash::success('Movimiento contable almacenado correctamente.');

        return redirect(route('admin.movimientosContables.show',['id' => $this->movimientoContable->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Display the specified movimiento_contable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->movimientoContable)) {
            Flash::error('Movimiento contable no encontrado');
            // guarda un mensaje en el archivo de log
            Log::notice('movimientosContables, Show, Movimiento contable no encontrado, id: '.$id);

            return redirect(route('admin.movimientosContables.index'));
        }
        //valida si tiene activos fijos o terceros y los agrega en una variable llamada terceroActivo
        if(count($this->movimientoContable->tercero)>0 ){
            $this->movimientoContable['terceroActivo'] = Tercero::ListaTerceros()->get();
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
    public function edit($id)
    {
        if (empty($this->movimientoContable)) {
            Flash::error('Movimiento contable no encontrado');
            // guarda un mensaje en el archivo de log
            Log::notice('movimientosContables, Edit, Movimiento contable no encontrado: '.$id);

            return redirect(route('admin.movimientosContables.index'));
        }
        //agrega el nombre de la cuenta auxiliar
        $this->movimientoContable['cuenta_fk_nombre'] = $this->movimientoContable->pc_cuentaauxiliar->codigo . ' - ' . $this->movimientoContable->pc_cuentaauxiliar->nombre;

        // guarda un mensaje en el archivo de log
        Log::info('movimientosContables, Edit, Mostrando edición de movimiento contable: '.$id);

        return view('admin.movimientosContables.edit', ['peticion' => $this->peticion, 'ruta' => 'movimientosContables', 'nombre' => 'movimiento contable', 'movimientoContable' => $this->movimientoContable, 'listTransaccion' => $this->listTransaccion, 'listSucursal' => $this->listSucursal, 'listTerceroActivo' => $this->listTerceroActivo, 'accion' => 'edit']);
    }

    /**
     * Update the specified movimiento_contable in storage.
     *
     * @param  int              $id
     * @param Updatemovimiento_contableRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemovimiento_contableRequest $request)
    {

        if (empty($this->movimientoContable)) {
            Flash::error('Movimiento contable no encontrado');
            // guarda un mensaje en el archivo de log
            Log::notice('movimientosContables, Update, Movimiento contable no encontrado: '.$id);

            return redirect(route('admin.movimientosContables.index'));
        }

        if($request->TER_ACT == 'TERCERO'){
            if(count($this->movimientoContable->activo_fijo)>0 ){
                $this->movimientoContable->activo_fijo()->sync([]);
            }
            //crea los registros para las relaciones de los terceros
            $this->movimientoContable->tercero()->sync($this->terceros);
        }elseif($request->TER_ACT == 'ACTIVO'){
            if(count($this->movimientoContable->tercero)>0 ){
                $this->movimientoContable->tercero()->sync([]);
            }
            //crea los registros para las relaciones de los activos fijos
            $this->movimientoContable->activo_fijo()->sync($this->activosFijos);
        }
        
        $this->movimientoContable = $this->movimientoContableRepository->update($request->all(), $id);

        Flash::success('Movimiento contable actualizado correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('movimientosContables, Update, Movimiento contable actualizado correctamente: '.$id, [$request->all()]);

        return redirect(route('admin.movimientosContables.show',['id' => $this->movimientoContable->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Remove the specified movimiento_contable from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->movimientoContable)) {
            Flash::error('Movimiento contable no encontrado');
            // guarda un mensaje en el archivo de log
            Log::notice('movimientosContables, Destroy, Movimiento contable no encontrado: '.$id);

            return redirect(route('admin.movimientosContables.index'));
        }

        $this->movimientoContableRepository->delete($id);

        Flash::success('Movimiento contable eliminado correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('movimientosContables, Destroy, Movimiento contable eliminado correctamente: '.$id);

        return redirect(route('admin.movimientosContables.index'));
    }
}
