<?php

namespace App\Http\Controllers\Admin\Puc;

use App\Http\Requests;
use App\Http\Requests\Admin\Puc\Createpuc_subcuentaRequest;
use App\Http\Requests\Admin\Puc\Updatepuc_subcuentaRequest;
use App\Repositories\Admin\Puc\puc_subcuentaRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use App\Models\Admin\Puc\puc_clase;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

class puc_subcuentaController extends \App\Http\Controllers\AppBaseController
{
    /** @var  puc_subcuentaRepository */
    private $pucSubcuentaRepository;
    private $listClases;
    private $pucCuenta;
    private $peticion;

    public function __construct(puc_subcuentaRepository $pucSubcuentaRepo, Request $request)
    {
        $this->pucSubcuentaRepository = $pucSubcuentaRepo;
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
        $this->pucCuenta = $this->pucSubcuentaRepository->findWithoutFail( intval( $route->getParameter('subcuentas') ) );
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function selection(){
        //se lista el nombre y el id correspondiente a todos los puc_cuenta
        $this->listClases =  puc_clase::select(DB::raw("CONCAT(codigo, ' - ', nombre) as nombre, id"))->orderBy('id', 'asc')->lists('nombre','id');
    }

    /**
     * Display a listing of the puc_subcuenta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pucSubcuentaRepository->pushCriteria(new RequestCriteria($request));
        $pucCuentas = $this->pucSubcuentaRepository;
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
            Log::info('Subcuentas, Index, Lista de subcuentas sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('Subcuentas, Index, Mostrando lista de subcuentas: '.$request->fullUrl() );
        }
        
        $pucCuentas = $pucCuentas->orderBy('codigo', 'asc')->paginate(15);
        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'subcuentas', 'nombre' => 'subcuenta', 'pucCuentas' => $pucCuentas]);
    }

    /**
     * Show the form for creating a new puc_subcuenta.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Subcuentas, Create, Mostrando formulario de creación de subcuentas');
        return view('admin.puc.pucCuentas.create', ['peticion' => $this->peticion, 'ruta' => 'subcuentas', 'nombre' => 'subcuenta', 'listClases' => $this->listClases]);
    }

    /**
     * Store a newly created puc_subcuenta in storage.
     *
     * @param Createpuc_subcuentaRequest $request
     *
     * @return Response
     */
    public function store(Createpuc_subcuentaRequest $request)
    {
        $input = $request->all();

        $this->pucCuenta = $this->pucSubcuentaRepository->create($input);
        // guarda un mensaje en el archivo de log
        Log::info('Subcuentas, Store, Se almaceno la subcuenta: '.$this->pucCuenta->id, [$input]);

        Flash::success('Subcuenta guardada correctamente.');

        return redirect(route('admin.puc.subcuentas.show',['id' => $this->pucCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Display the specified puc_subcuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Subcuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Subcuentas, Show, Subcuenta no encontrada, id: '.$id);

            return redirect(route('admin.puc.subcuentas.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Subcuentas, Show, Mostrando subcuenta, id: '.$id);

        return view('admin.puc.pucCuentas.show', ['peticion' => $this->peticion, 'ruta' => 'subcuentas', 'nombre' => 'subcuenta', 'pucCuenta' => $this->pucCuenta]);
    }

    /**
     * Show the form for editing the specified puc_subcuenta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Subcuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Subcuentas, Edit, Subcuenta no encontrada: '.$id);

            return redirect(route('admin.puc.subcuentas.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Subcuentas, Edit, Mostrando edición de subcuenta: '.$id);

        return view('admin.puc.pucCuentas.edit', ['peticion' => $this->peticion, 'ruta' => 'subcuentas', 'nombre' => 'subcuenta', 'pucCuenta' => $this->pucCuenta, 'listClases' => $this->listClases]);
    
    }

    /**
     * Update the specified puc_subcuenta in storage.
     *
     * @param  int              $id
     * @param Updatepuc_subcuentaRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepuc_subcuentaRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:puc_subcuenta,codigo,'.$id
        ]);

        if (empty($this->pucCuenta)) {
            Flash::error('Subcuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Subcuentas, Update, Subcuenta no encontrada: '.$id);

            return redirect(route('admin.puc.subcuentas.index'));
        }

        $this->pucCuenta = $this->pucSubcuentaRepository->update($request->all(), $id);

        Flash::success('Subcuenta actualizada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('Subcuentas, Update, Subcuenta actualizada correctamente: '.$id, [$request->all()]);

        return redirect(route('admin.puc.subcuentas.show',['id' => $this->pucCuenta->id, 'peticion' => $this->peticion]) );
    }

    /**
     * Remove the specified puc_subcuenta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Subcuenta no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Subcuentas, Destroy, Subcuenta no encontrada: '.$id);

            return redirect(route('admin.puc.subcuentas.index'));
        }
        if ($this->pucCuenta->cuentasauxiliares()->count() > 0 ) {
            Flash::error('La subcuenta tiene dependencias, no se puede eliminar.');
            // guarda un mensaje en el archivo de log
            Log::error('Subcuentas, Destroy, La subcuenta tiene dependencias, no se puede eliminar: '.$id);

            return redirect(route('admin.puc.subcuentas.show',['id' => $id, 'peticion' => $this->peticion]) );
        }

        $this->pucSubcuentaRepository->delete($id);

        Flash::success('Subcuenta eliminada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('Subcuentas, Destroy, Subcuenta eliminada correctamente: '.$id);

        return redirect(route('admin.puc.subcuentas.index'));
    }
}
