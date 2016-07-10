<?php

namespace App\Http\Controllers\Admin\Puc;

use App\Http\Requests;
use App\Http\Requests\Admin\Puc\Createpuc_cuentaRequest;
use App\Http\Requests\Admin\Puc\Updatepuc_cuentaRequest;
use App\Repositories\Admin\Puc\puc_cuentaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use App\Models\Admin\Puc\puc_clase;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

class puc_cuentaController extends \App\Http\Controllers\AppBaseController
{
    /** @var  puc_cuentaRepository */
    private $pucCuentaRepository;
    private $listClases;
    private $pucCuenta;
    private $peticion;

    public function __construct(puc_cuentaRepository $pucCuentaRepo, Request $request)
    {
        $this->pucCuentaRepository = $pucCuentaRepo;
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
        $this->pucCuenta = $this->pucCuentaRepository->findWithoutFail( intval( $route->getParameter('cuentas') ) );
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function selection(){
        //se lista el nombre y el id correspondiente a todos los puc_clase
        $this->listClases =  puc_clase::select(DB::raw("CONCAT(codigo, ' - ', nombre) as nombre, id"))->orderBy('id', 'asc')->lists('nombre','id');
    }

    /**
     * Display a listing of the puc_cuenta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pucCuentaRepository->pushCriteria(new RequestCriteria($request));
        $pucCuentas = $this->pucCuentaRepository;
        $vista = "admin.puc.pucCuentas.index";
        //si hay un request con el nombre busqueda se envia el parametro para realizar la busqueda
        if ( isset($request->busqueda) ) {
            $pucCuentas = $pucCuentas->busqueda($request->busqueda);
        }
        //si hay un request con el nombre listaid se envia el parametro para realizar la busqueda de todos los registros que tengan la llave foranea con ese valor
        if ( isset($request->listaid) ) {
            $pucCuentas = $pucCuentas->listaid($request->listaid);
        }
        // guarda un mensaje en el archivo de log
        if( count($pucCuentas) == 0 ){
            Log::info('Cuentas, Index, Lista de cuentas sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('Cuentas, Index, Mostrando lista de cuentas: '.$request->fullUrl() );
        }

        $pucCuentas = $pucCuentas->orderBy('codigo', 'asc')->paginate(15);
        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'cuentas', 'nombre' => 'cuenta', 'pucCuentas' => $pucCuentas]);
    }

    /**
     * Show the form for creating a new puc_cuenta.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas, Create, Mostrando formulario de creación de cuentas');
        return view('admin.puc.pucCuentas.create', ['peticion' => $this->peticion, 'ruta' => 'cuentas', 'nombre' => 'cuenta', 'listClases' => $this->listClases]);
    }

    /**
     * Store a newly created puc_cuenta in storage.
     *
     * @param Createpuc_cuentaRequest $request
     *
     * @return Response
     */
    public function store(Createpuc_cuentaRequest $request)
    {
        $input = $request->all();

        $this->pucCuenta = $this->pucCuentaRepository->create($input);
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas, Store, Se almaceno la cuenta: '.$this->pucCuenta->id, [$input]);

        Flash::success('Cuenta guardada correctamente.');

        return redirect(route('admin.puc.cuentas.show',['id' => $this->pucCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Display the specified puc_cuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Cuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas, Show, Cuenta no encontrada, id: '.$id);

            return redirect(route('admin.puc.cuentas.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas, Show, Mostrando cuenta, id: '.$id);

        return view('admin.puc.pucCuentas.show', ['peticion' => $this->peticion, 'ruta' => 'cuentas', 'nombre' => 'cuenta', 'pucCuenta' => $this->pucCuenta]);
    }

    /**
     * Show the form for editing the specified puc_cuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Cuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas, Edit, Cuenta no encontrada: '.$id);

            return redirect(route('admin.puc.cuentas.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas, Edit, Mostrando edición de cuenta: '.$id);

        return view('admin.puc.pucCuentas.edit', ['peticion' => $this->peticion, 'ruta' => 'cuentas', 'nombre' => 'cuenta', 'pucCuenta' => $this->pucCuenta, 'listClases' => $this->listClases]);
    }

    /**
     * Update the specified puc_cuenta in storage.
     *
     * @param  int              $id
     * @param Updatepuc_cuentaRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepuc_cuentaRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:puc_cuenta,codigo,'.$id
        ]);
        
        if (empty($this->pucCuenta)) {
            Flash::error('Cuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas, Update, Cuenta no encontrada: '.$id);

            return redirect(route('admin.puc.cuentas.index'));
        }

        $this->pucCuenta = $this->pucCuentaRepository->update($request->all(), $id);

        Flash::success('Cuenta actualizada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas, Update, Cuenta actualizada correctamente: '.$id, [$request->all()]);

        return redirect(route('admin.puc.cuentas.show',['id' => $this->pucCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Remove the specified puc_cuenta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Cuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas, Destroy, Cuenta no encontrada: '.$id);

            return redirect(route('admin.puc.cuentas.index'));
        }
        if ($this->pucCuenta->subcuentas()->count() > 0 ) {
            Flash::error('La cuenta tiene dependencias, no se puede eliminar.');
            // guarda un mensaje en el archivo de log
            Log::error('Cuentas, Destroy, La cuenta tiene dependencias, no se puede eliminar: '.$id);

            return redirect(route('admin.puc.cuentas.show',['id' => $id, 'peticion' => $this->peticion]) );
        }

        $this->pucCuentaRepository->delete($id);

        Flash::success('Cuenta eliminada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('Cuentas, Destroy, Cuenta eliminada correctamente: '.$id);

        return redirect(route('admin.puc.cuentas.index'));
    }
}
