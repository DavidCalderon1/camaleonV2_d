<?php

namespace App\Http\Controllers\Admin\Pc;

use App\Http\Requests;
use App\Http\Requests\Admin\Pc\Createpc_cuentaRequest;
use App\Http\Requests\Admin\Pc\Updatepc_cuentaRequest;
use App\Repositories\Admin\Pc\pc_cuentaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use App\Models\Admin\Pc\pc_clase;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

class pc_cuentaController extends \App\Http\Controllers\AppBaseController
{
    /** @var  pc_cuentaRepository */
    private $pcCuentaRepository;
    private $listClases;
    private $pcCuenta;
    private $peticion;

    public function __construct(pc_cuentaRepository $pcCuentaRepo, Request $request)
    {
        $this->pcCuentaRepository = $pcCuentaRepo;
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
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso es 'cuentas' el configurado en las rutas
        $this->pcCuenta = $this->pcCuentaRepository->findWithoutFail( intval( $route->getParameter('cuentas') ) );
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function selection(){
        //se lista el nombre y el id correspondiente a todos los pc_clase
        $this->listClases =  pc_clase::select(DB::raw("CONCAT(codigo, ' - ', nombre) as nombre, id"))->orderBy('id', 'asc')->lists('nombre','id');
    }

    /**
     * Display a listing of the pc_cuenta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pcCuentaRepository->pushCriteria(new RequestCriteria($request));
        $pcCuentas = $this->pcCuentaRepository;
        $vista = "admin.pc.pcCuentas.index";
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
            Log::info('Cuentas, Index, Lista de cuentas sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('Cuentas, Index, Mostrando lista de cuentas: '.$request->fullUrl() );
        }

        //ordena los campos ya sea por la forma normal o llamando al metodo ordenarPor()
        if ( isset($request->tipo_cuenta) && ( isset($request->listaid) || isset($request->busqueda) ) ) {
            $pcCuentas = $pcCuentas->orderBy('codigo', 'asc')->orderBy('nombre', 'asc')->paginate(15);
        }else{
            $pcCuentas = $pcCuentas->ordenarPor(array('codigo' => 'asc', 'nombre' => 'asc'))->paginate(15);
        }
        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'cuentas', 'nombre' => 'cuenta', 'pcCuentas' => $pcCuentas]);
    }

    /**
     * Show the form for creating a new pc_cuenta.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas, Create, Mostrando formulario de creación de cuentas');
        return view('admin.pc.pcCuentas.create', ['peticion' => $this->peticion, 'ruta' => 'cuentas', 'nombre' => 'cuenta', 'listClases' => $this->listClases]);
    }

    /**
     * Store a newly created pc_cuenta in storage.
     *
     * @param Createpc_cuentaRequest $request
     *
     * @return Response
     */
    public function store(Createpc_cuentaRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:pc_cuenta,codigo,NULL,tipo,tipo,' .$request->tipo
        ]);

        $input = $request->all();

        $this->pcCuenta = $this->pcCuentaRepository->create($input);
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas, Store, Se almaceno la cuenta: '.$this->pcCuenta->id, [$input]);

        Flash::success('Cuenta guardada correctamente.');

        return redirect(route('admin.pc.cuentas.show',['id' => $this->pcCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Display the specified pc_cuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Cuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas, Show, Cuenta no encontrada, id: '.$id);

            return redirect(route('admin.pc.cuentas.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas, Show, Mostrando cuenta, id: '.$id);

        return view('admin.pc.pcCuentas.show', ['peticion' => $this->peticion, 'ruta' => 'cuentas', 'nombre' => 'cuenta', 'pcCuenta' => $this->pcCuenta]);
    }

    /**
     * Show the form for editing the specified pc_cuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Cuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas, Edit, Cuenta no encontrada: '.$id);

            return redirect(route('admin.pc.cuentas.index'));
        }

        //agrega el nombre del grupo
        $this->pcCuenta['grupo_nombre'] = $this->pcCuenta->grupos->codigo . ' - ' . $this->pcCuenta->grupos->nombre;

        // guarda un mensaje en el archivo de log
        Log::info('Cuentas, Edit, Mostrando edición de cuenta: '.$id);

        return view('admin.pc.pcCuentas.edit', ['peticion' => $this->peticion, 'ruta' => 'cuentas', 'nombre' => 'cuenta', 'pcCuenta' => $this->pcCuenta, 'listClases' => $this->listClases]);
    }

    /**
     * Update the specified pc_cuenta in storage.
     *
     * @param  int              $id
     * @param Updatepc_cuentaRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepc_cuentaRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:pc_cuenta,codigo,'.$id.',id,tipo,' .$request->tipo
        ]);
        
        if (empty($this->pcCuenta)) {
            Flash::error('Cuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas, Update, Cuenta no encontrada: '.$id);

            return redirect(route('admin.pc.cuentas.index'));
        }

        $this->pcCuenta = $this->pcCuentaRepository->update($request->all(), $id);

        Flash::success('Cuenta actualizada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas, Update, Cuenta actualizada correctamente: '.$id, [$request->all()]);

        return redirect(route('admin.pc.cuentas.show',['id' => $this->pcCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Remove the specified pc_cuenta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Cuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas, Destroy, Cuenta no encontrada: '.$id);

            return redirect(route('admin.pc.cuentas.index'));
        }
        if ($this->pcCuenta->subcuentas()->count() > 0 ) {
            Flash::error('La cuenta tiene dependencias, no se puede eliminar.');
            // guarda un mensaje en el archivo de log
            Log::error('Cuentas, Destroy, La cuenta tiene dependencias, no se puede eliminar: '.$id);

            return redirect(route('admin.pc.cuentas.show',['id' => $id, 'peticion' => $this->peticion]) );
        }

        $this->pcCuentaRepository->delete($id);

        Flash::success('Cuenta eliminada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('Cuentas, Destroy, Cuenta eliminada correctamente: '.$id);

        return redirect(route('admin.pc.cuentas.index'));
    }
}
