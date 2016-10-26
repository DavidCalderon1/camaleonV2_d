<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Admin\CreatetransaccionRequest;
use App\Http\Requests\Admin\UpdatetransaccionRequest;
use App\Repositories\Admin\transaccionRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Admin\transaccion;
use App\Models\Admin\Tipodoc_contable;
use App\Models\Admin\movimiento_contable;
use App\Models\Tercero;

// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

class transaccionController extends InfyOmBaseController
{
    /** @var  transaccionRepository */
    private $transaccionRepository;

    private $listTipoDocC;
    private $listMovimiento;
    private $transaccion;
    private $peticion;

    public function __construct(transaccionRepository $transaccionRepo, Request $request)
    {
        $this->transaccionRepository = $transaccionRepo;
	//filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo en el que se desea ejecutar
        $this->beforeFilter('@find',['only' => ['edit','show','update','destroy'] ]);
        $this->beforeFilter('@selection',['only' => ['crear','create','edit','buscar'] ]);
        $this->beforeFilter('@listMovimientos',['only' => ['show'] ]);
        $this->peticion = "normal";
        //va a mostrar la vista 'tables' en el caso de ser una peticion de tipo ajax
        if ($request->ajax() || $request->peticion == "ajax") {
            $this->peticion = "ajax";
        }
    }
    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function find(Route $route){
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso es 'transacciones' el configurado en las rutas
        $action = explode('@', $route->getActionName());
        
        if( in_array ($action[1], ['edit','update','destroy'] ) ){
            $this->transaccion = transaccion::where('id', intval( $route->getParameter('transacciones') ) );
            $this->transaccion = $this->transaccion->where('auto',false)->firstOrFail();
        }else{
            $this->transaccion = $this->transaccionRepository->findWithoutFail( intval( $route->getParameter('transacciones') ) );
        }
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function selection(){
        //se lista el nombre y el id correspondiente a todos los sucursal
        $this->listTipoDocC =  Tipodoc_contable::select('descripcion', 'id')->orderBy('id', 'asc')->lists('descripcion','id');

    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function listMovimientos(Route $route, Request $request){
        //se listan los datos necesarios de los movimientos con la cuenta, sucursal y tercero/activo
        $this->listMovimiento =  movimiento_contable::ListaMovimientos( intval( $route->getParameter('transacciones') ) )->paginate(4);
        
    }

    /**
     * Display a listing of the transaccion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transaccionRepository->pushCriteria(new RequestCriteria($request));
        $transacciones = $this->transaccionRepository;
        $vista = "admin.transacciones.index";
        // guarda un mensaje en el archivo de log
        if( count($transacciones) == 0 ){
            Log::info('transacciones, Index, Lista de transacciones sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('transacciones, Index, Mostrando lista de transacciones: '.$request->fullUrl() );
        }
        $transacciones = $transacciones->orderBy('id', 'asc')->paginate(15);

        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'transacciones', 'nombre' => 'transacci&oacute;n', 'transacciones' => $transacciones]);

    }

    /**
     * Show the form for creating a new transaccion.
     *
     * @return Response
     */
    public function crear()
    {
        // guarda un mensaje en el archivo de log
        Log::info('transacciones, Create, Mostrando formulario de creación de transacciones');
        return view('admin.transacciones.create', ['peticion' => $this->peticion, 'ruta' => 'transacciones', 'nombre' => 'transacci&oacute;n', 'listTipoDocC' => $this->listTipoDocC]);
    }

    /**
     * Show the form for creating a new transaccion.
     *
     * @return Response
     */
    public function buscar(Request $request)
    {
        $vista = 'admin.transacciones.buscar';
        if( $request->ajax() ){
            $vista = 'admin.transacciones.index';
        }
        if( isset($request->busqueda) ){
            $this->transaccionRepository->pushCriteria(new RequestCriteria($request));
            $transacciones = $this->transaccionRepository;
            $transacciones = $transacciones->Busqueda("CAST(" .$request->tipo. " AS varchar(255) ) LIKE '%".$request->busqueda."%'")->orderBy('id', 'asc')->paginate(15);

            // guarda un mensaje en el archivo de log
            if( count($transacciones) == 0 ){
            // guarda un mensaje en el archivo de log
                Log::info('transacciones, buscar, busqueda de transacciones sin resultados: '.$request->fullUrl() );
            }else{
            // guarda un mensaje en el archivo de log
                Log::info('transacciones, buscar, Mostrando resultado de busqueda de transacciones: '.$request->fullUrl() );
            }

            return view($vista, ['peticion' => $this->peticion, 'ruta' => 'transacciones', 'nombre' => 'transacci&oacute;n', 'transacciones' => $transacciones, 'listTipoDocC' => $this->listTipoDocC]);
        }
        // guarda un mensaje en el archivo de log
        Log::info('transacciones, buscar, Mostrando formulario de busqueda de transacciones');
        return view('admin.transacciones.buscar', ['peticion' => $this->peticion, 'ruta' => 'transacciones', 'nombre' => 'transacci&oacute;n', 'listTipoDocC' => $this->listTipoDocC]);
    }

    /**
     * Show the form for creating a new transaccion.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('transacciones, Create, Mostrando formulario de creación de transacciones');
        return view('admin.transacciones.create', ['peticion' => $this->peticion, 'ruta' => 'transacciones', 'nombre' => 'transacci&oacute;n', 'listTipoDocC' => $this->listTipoDocC]);
    }

    /**
     * Store a newly created transaccion in storage.
     *
     * @param CreatetransaccionRequest $request
     *
     * @return Response
     */
    public function store(CreatetransaccionRequest $request)
    {
        $input = $request->all();

        $this->transaccion = $this->transaccionRepository->create($input);

	// guarda un mensaje en el archivo de log
        Log::info('transacciones, Store, Se almaceno la transaccion: '.$this->transaccion->id, [$input]);

        Flash::success('transaccion almacenada correctamente.');

        return redirect(route('admin.transacciones.show',['id' => $this->transaccion->id]) );
    }

    /**
     * Display the specified transaccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->transaccion)) {
            Flash::error('Transaccion no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('transacciones, Show, Transaccion no encontrada, id: '.$id);

            return redirect(route('admin.transacciones.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('transacciones, Show, Mostrando transaccion, id: '.$id);

        return view('admin.transacciones.show', ['peticion' => $this->peticion, 'ruta' => 'transacciones', 'nombre' => 'transacci&oacute;n', 'transaccion' => $this->transaccion, 'movimientoContables' => $this->listMovimiento]);
    }

    /**
     * Show the form for editing the specified transaccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->transaccion)) {
            Flash::error('Transaccion no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('transacciones, Edit, Transaccion no encontrada: '.$id);

            return redirect(route('admin.transacciones.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('transacciones, Edit, Mostrando edición de transaccion: '.$id);

        return view('admin.transacciones.edit', ['peticion' => $this->peticion, 'ruta' => 'transacciones', 'nombre' => 'transacci&oacute;n', 'transaccion' => $this->transaccion, 'listTipoDocC' => $this->listTipoDocC]);
    }

    /**
     * Update the specified transaccion in storage.
     *
     * @param  int              $id
     * @param UpdatetransaccionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetransaccionRequest $request)
    {
        if (empty($this->transaccion)) {
            Flash::error('Transaccion no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('transacciones, Update, Transaccion no encontrada: '.$id);

            return redirect(route('admin.transacciones.index'));
        }

        $this->transaccion = $this->transaccionRepository->update($request->all(), $id);

        Flash::success('Transaccion actualizada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('transacciones, Update, Transaccion actualizada correctamente: '.$id, [$request->all()]);

        return redirect(route('admin.transacciones.show',['id' => $this->transaccion->id ]) );
    }

    /**
     * Remove the specified transaccion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->transaccion)) {
            Flash::error('Transaccion no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('transacciones, Destroy, Transaccion no encontrada: '.$id);

            return redirect(route('admin.transacciones.index'));
        }
        if ($this->transaccion->movimiento_contable()->count() > 0 ) {
            Flash::error('La transacci&oacute;n tiene dependencias, no se puede eliminar.');
            // guarda un mensaje en el archivo de log
            Log::error('transacciones, Destroy, La transacci&oacute;n tiene dependencias, no se puede eliminar: '.$id);

            return redirect(route('admin.transacciones.show',['id' => $id]) );
        }

        $this->transaccionRepository->delete($id);

        Flash::success('Transaccion eliminada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('transacciones, Destroy, Transaccion eliminada correctamente: '.$id);

        return redirect(route('admin.transacciones.index'));
    }
}
