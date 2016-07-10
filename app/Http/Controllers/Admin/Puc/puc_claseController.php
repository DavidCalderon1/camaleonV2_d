<?php

namespace App\Http\Controllers\Admin\Puc;

use App\Http\Requests;
use App\Http\Requests\Admin\Puc\Createpuc_claseRequest;
use App\Http\Requests\Admin\Puc\Updatepuc_claseRequest;
use App\Repositories\Admin\Puc\puc_claseRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

class puc_claseController extends \App\Http\Controllers\AppBaseController
{
    /** @var  puc_claseRepository */
    private $pucClaseRepository;
    private $pucCuenta;
    private $peticion;

    public function __construct(puc_claseRepository $pucClaseRepo, Request $request)
    {
        $this->pucClaseRepository = $pucClaseRepo;
        //filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo en el que se desea ejecutar
        $this->beforeFilter('@find',['only' => ['edit','show','update','destroy'] ]);
        $this->peticion = "normal";
        //va a mostrar la vista 'tables' en el caso de ser una peticion de tipo ajax
        if ($request->ajax() || $request->peticion == "ajax") {
            $this->peticion = "ajax";
        }
    }
    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function find(Route $route){
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso es 'clases' el configurado en las rutas
        $this->pucCuenta = $this->pucClaseRepository->findWithoutFail( intval( $route->getParameter('clases') ) );
    }

    /**
     * Display a listing of the puc_clase.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pucClaseRepository->pushCriteria(new RequestCriteria($request));
        $pucCuentas = $this->pucClaseRepository;
        $vista = "admin.puc.pucCuentas.index";

        //si hay un request con el nombre busqueda se envia el parametro para realizar la busqueda
        if ( isset($request->busqueda) ) {
            $pucCuentas = $pucCuentas->busqueda($request->busqueda);
            /*
            // de esta manera se puede crear un query con scopes en el modelo
            $pucCuentas = $this->pucClaseRepository->scopeQuery(function($query){
                return $query->orderBy('codigo','asc');
            })->busqueda($request->busqueda)->paginate(15);
            */
        }
        //si hay un request con el nombre listaid se envia el parametro para realizar la busqueda de todos los registros que tengan la llave foranea con ese valor
        if ( isset($request->listaid) ) {
            $pucCuentas = $pucCuentas->listaid($request->listaid);
        }
        // guarda un mensaje en el archivo de log
        if( count($pucCuentas) == 0 ){
            Log::info('Clases, Index, Lista de clases sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('Clases, Index, Mostrando lista de clases: '.$request->fullUrl() );
        }

        $pucCuentas = $pucCuentas->orderBy('codigo', 'asc')->paginate(15);

        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'clases', 'nombre' => 'clase', 'pucCuentas' => $pucCuentas]);
    }

    /**
     * Show the form for creating a new puc_clase.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Clases, Create, Mostrando formulario de creacion de clases');
        return view('admin.puc.pucCuentas.create', ['peticion' => $this->peticion, 'ruta' => 'clases', 'nombre' => 'clase']);
    }

    /**
     * Store a newly created puc_clase in storage.
     *
     * @param Createpuc_claseRequest $request
     *
     * @return Response
     */
    public function store(Createpuc_claseRequest $request)
    {
        $input = $request->all();

        $this->pucCuenta = $this->pucClaseRepository->create($input);
        // guarda un mensaje en el archivo de log
        Log::info('Clases, Store, Se almaceno la clase: '.$this->pucCuenta->id, [$input]);

        Flash::success('Clase guardada correctamente.');

        return redirect(route('admin.puc.clases.show',['id' => $this->pucCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Display the specified puc_clase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Clase no encontrada.');
            // guarda un mensaje en el archivo de log
            Log::notice('Clases, Show, Clase no encontrada, id: '.$id);

            return redirect(route('admin.puc.clases.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Clases, Show, Mostrando clase, id: '.$id);
        
        return view('admin.puc.pucCuentas.show', ['peticion' => $this->peticion, 'ruta' => 'clases', 'nombre' => 'clase', 'pucCuenta' => $this->pucCuenta]);
    }

    /**
     * Show the form for editing the specified puc_clase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Clase no encontrada.');
            // guarda un mensaje en el archivo de log
            Log::notice('Clases, Edit, Clase no encontrada: '.$id);

            return redirect(route('admin.puc.cuentas.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Clases, Edit, Mostrando edicion de clase: '.$id);

        return view('admin.puc.pucCuentas.edit', ['peticion' => $this->peticion, 'ruta' => 'clases', 'nombre' => 'clase', 'pucCuenta' => $this->pucCuenta]);
    }

    /**
     * Update the specified puc_clase in storage.
     *
     * @param  int              $id
     * @param Updatepuc_claseRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepuc_claseRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:puc_clase,codigo,'.$id
        ]);

        if (empty($this->pucCuenta)) {
            Flash::error('Clase no encontrada.');
            // guarda un mensaje en el archivo de log
            Log::notice('Clases, Update, Clase no encontrada: '.$id);

            return redirect(route('admin.puc.clases.index'));
        }

        $this->pucCuenta = $this->pucClaseRepository->update($request->all(), $id);

        Flash::success('Clase actualizada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('Clases, Update, Clase actualizada correctamente: '.$id, [$request->all()]);

        //return redirect(route('admin.puc.clases.index'));
        return redirect(route('admin.puc.clases.show',['id' => $this->pucCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Remove the specified puc_clase from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Clase no encontrada.');
            // guarda un mensaje en el archivo de log
            Log::notice('Clases, Destroy, Clase no encontrada: '.$id);

            return redirect(route('admin.puc.clases.index'));
        }
        if ($this->pucCuenta->grupos()->count() > 0 ) {
            Flash::error('La clase tiene dependencias, no se puede eliminar.');
            // guarda un mensaje en el archivo de log
            Log::error('Clases, Destroy, La clase tiene dependencias, no se puede eliminar: '.$id);

            return redirect(route('admin.puc.clases.show',['id' => $id, 'peticion' => $this->peticion ]) );
        }

        $this->pucClaseRepository->delete($id);

        Flash::success('Clase eliminada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('Clases, Destroy, Clase eliminada correctamente: '.$id);

        return redirect(route('admin.puc.clases.index'));
    }
}
