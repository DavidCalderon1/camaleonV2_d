<?php

namespace App\Http\Controllers\Admin\Pc;

use App\Http\Requests;
use App\Http\Requests\Admin\Pc\Createpc_subcuentaRequest;
use App\Http\Requests\Admin\Pc\Updatepc_subcuentaRequest;
use App\Repositories\Admin\Pc\pc_subcuentaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use App\Models\Admin\Pc\pc_clase;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

class pc_subcuentaController extends \App\Http\Controllers\AppBaseController
{
    /** @var  pc_subcuentaRepository */
    private $pcSubcuentaRepository;
    private $listClases;
    private $pcCuenta;
    private $peticion;

    public function __construct(pc_subcuentaRepository $pcSubcuentaRepo, Request $request)
    {
        $this->pcSubcuentaRepository = $pcSubcuentaRepo;
        //filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo en el que se desea ejecutar
        $this->beforeFilter('@find',['only' => ['edit','show','update','destroy'] ]);
        $this->beforeFilter('@selection',['only' => ['create','edit'] ]);
        $this->peticion = "normal";
        //va a mostrar la vista 'tables' en el caso de ser una peticion de tipo ajax
        if ($request->ajax() || $request->peticion == "ajax") {
            $this->peticion = "ajax";
        }
    }
    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function find(Route $route){
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso es 'subcuentas' el configurado en las rutas
        $this->pcCuenta = $this->pcSubcuentaRepository->findWithoutFail( intval( $route->getParameter('subcuentas') ) );
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function selection(){
        //se lista el nombre y el id correspondiente a todos los pc_cuenta
        //$this->listClases =  pc_clase::select(DB::raw("CONCAT(codigo, ' - ', nombre) as nombre, id"))->orderBy('id', 'asc')->lists('nombre','id');
    }

    /**
     * Display a listing of the pc_subcuenta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pcSubcuentaRepository->pushCriteria(new RequestCriteria($request));
        $pcCuentas = $this->pcSubcuentaRepository;
        $vista = "admin.pc.pcCuentas.index";

        //si hay un request con el nombre tipo_cuenta y busqueda se envia el parametro para realizar la busqueda
        if ( isset($request->tipo_cuenta) && (!isset($request->busqueda) && !isset($request->listaid)) ) {
            $pcCuentas = $pcCuentas->tipoCuenta($request->tipo_cuenta);
        }
        //si hay un request con el nombre busqueda se envia el parametro para realizar la busqueda
        if ( isset($request->tipo_cuenta) && isset($request->busqueda) ) {
            $pcCuentas = $pcCuentas->busqueda($request->tipo_cuenta, $request->busqueda);
        }
        //si hay un request con el nombre listaid se envia el parametro para realizar la busqueda de todos los registros que tengan la llave foranea con ese valor
        if ( isset($request->tipo_cuenta) && isset($request->listaid) ) {
            $pcCuentas = $pcCuentas->listaid($request->tipo_cuenta, $request->listaid);
        }
        // guarda un mensaje en el archivo de log
        if( count($pcCuentas) == 0 ){
            Log::info('Subcuentas, Index, Lista de subcuentas sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('Subcuentas, Index, Mostrando lista de subcuentas: '.$request->fullUrl() );
        }
        
        //ordena los campos ya sea por la forma normal o llamando al metodo ordenarPor()
        if ( isset($request->tipo_cuenta) && ( isset($request->listaid) || isset($request->busqueda) ) ) {
            $pcCuentas = $pcCuentas->orderBy('codigo', 'asc')->orderBy('nombre', 'asc')->paginate(15);
        }else{
            $pcCuentas = $pcCuentas->ordenarPor(array('codigo' => 'asc', 'nombre' => 'asc'))->paginate(15);
        }
        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'subcuentas', 'nombre' => 'subcuenta', 'pcCuentas' => $pcCuentas]);
    }

    /**
     * Show the form for creating a new pc_subcuenta.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Subcuentas, Create, Mostrando formulario de creación de subcuentas');
        return view('admin.pc.pcCuentas.create', ['peticion' => $this->peticion, 'ruta' => 'subcuentas', 'nombre' => 'subcuenta', 'listClases' => $this->listClases]);
    }

    /**
     * Store a newly created pc_subcuenta in storage.
     *
     * @param Createpc_subcuentaRequest $request
     *
     * @return Response
     */
    public function store(Createpc_subcuentaRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:pc_subcuenta,codigo,NULL,tipo,tipo,' .$request->tipo
        ]);

        $input = $request->all();

        $this->pcCuenta = $this->pcSubcuentaRepository->create($input);
        // guarda un mensaje en el archivo de log
        Log::info('Subcuentas, Store, Se almaceno la subcuenta: '.$this->pcCuenta->id, [$input]);

        Flash::success('Subcuenta guardada correctamente.');

        return redirect(route('admin.pc.subcuentas.show',['id' => $this->pcCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Display the specified pc_subcuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Subcuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Subcuentas, Show, Subcuenta no encontrada, id: '.$id);

            return redirect(route('admin.pc.subcuentas.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Subcuentas, Show, Mostrando subcuenta, id: '.$id);

        return view('admin.pc.pcCuentas.show', ['peticion' => $this->peticion, 'ruta' => 'subcuentas', 'nombre' => 'subcuenta', 'pcCuenta' => $this->pcCuenta]);
    }

    /**
     * Show the form for editing the specified pc_subcuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Subcuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Subcuentas, Edit, Subcuenta no encontrada: '.$id);

            return redirect(route('admin.pc.subcuentas.index'));
        }

        //agrega el nombre de la cuenta
        $this->pcCuenta['cuenta_nombre'] = $this->pcCuenta->cuentas->codigo . ' - ' . $this->pcCuenta->cuentas->nombre . ' - ' . $this->pcCuenta->cuentas->tipo;

        // guarda un mensaje en el archivo de log
        Log::info('Subcuentas, Edit, Mostrando edición de subcuenta: '.$id);

        return view('admin.pc.pcCuentas.edit', ['peticion' => $this->peticion, 'ruta' => 'subcuentas', 'nombre' => 'subcuenta', 'pcCuenta' => $this->pcCuenta, 'listClases' => $this->listClases]);
    
    }

    /**
     * Update the specified pc_subcuenta in storage.
     *
     * @param  int              $id
     * @param Updatepc_subcuentaRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepc_subcuentaRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:pc_subcuenta,codigo,'.$id.',id,tipo,' .$request->tipo
        ]);

        if (empty($this->pcCuenta)) {
            Flash::error('Subcuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Subcuentas, Update, Subcuenta no encontrada: '.$id);

            return redirect(route('admin.pc.subcuentas.index'));
        }

        $this->pcCuenta = $this->pcSubcuentaRepository->update($request->all(), $id);

        Flash::success('Subcuenta actualizada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('Subcuentas, Update, Subcuenta actualizada correctamente: '.$id, [$request->all()]);

        return redirect(route('admin.pc.subcuentas.show',['id' => $this->pcCuenta->id, 'peticion' => $this->peticion]) );
    }

    /**
     * Remove the specified pc_subcuenta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Subcuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Subcuentas, Destroy, Subcuenta no encontrada: '.$id);

            return redirect(route('admin.pc.subcuentas.index'));
        }
        if ($this->pcCuenta->cuentasauxiliares()->count() > 0 ) {
            Flash::error('La subcuenta tiene dependencias, no se puede eliminar.');
            // guarda un mensaje en el archivo de log
            Log::error('Subcuentas, Destroy, La subcuenta tiene dependencias, no se puede eliminar: '.$id);

            return redirect(route('admin.pc.subcuentas.show',['id' => $id, 'peticion' => $this->peticion]) );
        }

        $this->pcSubcuentaRepository->delete($id);

        Flash::success('Subcuenta eliminada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('Subcuentas, Destroy, Subcuenta eliminada correctamente: '.$id);

        return redirect(route('admin.pc.subcuentas.index'));
    }
}
