<?php

namespace App\Http\Controllers\Admin\Puc;

use App\Http\Requests;
use App\Http\Requests\Admin\Puc\Createpuc_cuentaauxiliarRequest;
use App\Http\Requests\Admin\Puc\Updatepuc_cuentaauxiliarRequest;
use App\Repositories\Admin\Puc\puc_cuentaauxiliarRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use App\Models\Admin\Puc\puc_clase;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

class puc_cuentaauxiliarController extends \App\Http\Controllers\AppBaseController
{
    /** @var  puc_cuentaauxiliarRepository */
    private $pucCuentaauxiliarRepository;
    private $listClases;
    private $pucCuenta;
    private $peticion;

    public function __construct(puc_cuentaauxiliarRepository $pucCuentaauxiliarRepo, Request $request)
    {
        $this->pucCuentaauxiliarRepository = $pucCuentaauxiliarRepo;
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
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso es 'cuentasauxiliares' el configurado en las rutas
        $this->pucCuenta = $this->pucCuentaauxiliarRepository->findWithoutFail( intval( $route->getParameter('cuentasauxiliares') ) );
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function selection(){
        //se lista el nombre y el id correspondiente a todas las puc_subcuenta
        $this->listClases =  puc_clase::select(DB::raw("CONCAT(codigo, ' - ', nombre) as nombre, id"))->orderBy('id', 'asc')->lists('nombre','id');
    }

    /**
     * Display a listing of the puc_cuentaauxiliar.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pucCuentaauxiliarRepository->pushCriteria(new RequestCriteria($request));
        $pucCuentas = $this->pucCuentaauxiliarRepository;
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
            Log::info('Cuentas auxiliares, Index, Lista de cuentas auxiliares sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('Cuentas auxiliares, Index, Mostrando lista de cuentas auxiliares: '.$request->fullUrl() );
        }

        $pucCuentas = $pucCuentas->orderBy('codigo', 'asc')->paginate(15);
        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'cuentasauxiliares', 'nombre' => 'cuentas auxiliares', 'pucCuentas' => $pucCuentas]);
    }

    /**
     * Show the form for creating a new puc_cuentaauxiliar.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas auxiliares, Create, Mostrando formulario de creación de cuentas auxiliares');
        return view('admin.puc.pucCuentas.create', ['peticion' => $this->peticion, 'ruta' => 'cuentasauxiliares', 'nombre' => 'cuentas auxiliares', 'listClases' => $this->listClases]);
    }

    /**
     * Store a newly created puc_cuentaauxiliar in storage.
     *
     * @param Createpuc_cuentaauxiliarRequest $request
     *
     * @return Response
     */
    public function store(Createpuc_cuentaauxiliarRequest $request)
    {
        $input = $request->all();

        $this->pucCuenta = $this->pucCuentaauxiliarRepository->create($input);
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas auxiliares, Store, Se almaceno la cuenta auxiliar: '.$this->pucCuenta->id, [$input]);

        Flash::success('Cuenta Auxiliar guardada correctamente.');

        return redirect(route('admin.puc.cuentasauxiliares.show',['id' => $this->pucCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Display the specified puc_cuentaauxiliar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Cuenta Auxiliar no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas auxiliares, Show, cuenta auxiliar no encontrada, id: '.$id);

            return redirect(route('admin.puc.cuentasauxiliares.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas auxiliares, Show, Mostrando cuenta auxiliar, id: '.$id);

        return view('admin.puc.pucCuentas.show', ['peticion' => $this->peticion, 'ruta' => 'cuentasauxiliares', 'nombre' => 'cuentas auxiliares', 'pucCuenta' => $this->pucCuenta]);
    }

    /**
     * Show the form for editing the specified puc_cuentaauxiliar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Cuenta Auxiliar no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas auxiliares, Edit, cuenta auxiliar no encontrada: '.$id);

            return redirect(route('admin.puc.cuentasauxiliares.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas auxiliares, Edit, Mostrando formulario de edición de cuenta auxiliar: '.$id);

        return view('admin.puc.pucCuentas.edit', ['peticion' => $this->peticion, 'ruta' => 'cuentasauxiliares', 'nombre' => 'cuentas auxiliares', 'pucCuenta' => $this->pucCuenta, 'listClases' => $this->listClases]);
    
    }

    /**
     * Update the specified puc_cuentaauxiliar in storage.
     *
     * @param  int              $id
     * @param Updatepuc_cuentaauxiliarRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepuc_cuentaauxiliarRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:puc_cuentaauxiliar,codigo,'.$id
        ]);

        if (empty($this->pucCuenta)) {
            Flash::error('Cuenta Auxiliar no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas auxiliares, Update, cuenta auxiliar no encontrada: '.$id);

            return redirect(route('admin.puc.cuentasauxiliares.index'));
        }

        $this->pucCuenta = $this->pucCuentaauxiliarRepository->update($request->all(), $id);

        Flash::success('Cuenta Auxiliar actualizada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas auxiliares, Update, cuenta auxiliar actualizada correctamente: '.$id, [$request->all()]);

        return redirect(route('admin.puc.cuentasauxiliares.show',['id' => $this->pucCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Remove the specified puc_cuentaauxiliar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Cuenta Auxiliar no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas auxiliares, Destroy, cuenta auxiliar no encontrada: '.$id);

            return redirect(route('admin.puc.cuentasauxiliares.index'));
        }

        $this->pucCuentaauxiliarRepository->delete($id);

        Flash::success('Cuenta Auxiliar eliminada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('Cuentas auxiliares, Destroy, cuenta auxiliar eliminada correctamente: '.$id);

        return redirect(route('admin.puc.cuentasauxiliares.index'));
    }
}
