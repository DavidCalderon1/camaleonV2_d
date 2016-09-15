<?php

namespace App\Http\Controllers\Admin\Pc;

use App\Http\Requests;
use App\Http\Requests\Admin\Pc\Createpc_claseRequest;
use App\Http\Requests\Admin\Pc\Updatepc_claseRequest;
use App\Repositories\Admin\Pc\pc_claseRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

/* ************************************************************* *
*-----|>
* Finalidad: .
*
* Entradas:
*  (): .
*  : .
*  
* Resultados: .
*  Si no ... .
*-----||
* ************************************************************* */
class pc_claseController extends \App\Http\Controllers\AppBaseController
{
    /** @var  pc_claseRepository */
    private $pcClaseRepository;
    private $pcCuenta;
    private $peticion;

    public function __construct(pc_claseRepository $pcClaseRepo, Request $request)
    {
        $this->pcClaseRepository = $pcClaseRepo;
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
        $this->pcCuenta = $this->pcClaseRepository->findWithoutFail( intval( $route->getParameter('clases') ) );
    }

    /**
     * Display a listing of the pc_clase.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pcClaseRepository->pushCriteria(new RequestCriteria($request));
        $pcCuentas = $this->pcClaseRepository;
        $vista = "admin.pc.pcCuentas.index";

        //si hay un request con el nombre tipo_cuenta y busqueda se envia el parametro para realizar la busqueda
        if ( isset($request->tipo_cuenta) && (!isset($request->busqueda) && !isset($request->listaid)) ) {
            $pcCuentas = $pcCuentas->tipoCuenta($request->tipo_cuenta);
        }
        //si hay un request con el nombre tipo_cuenta y busqueda se envia el parametro para realizar la busqueda
        if ( isset($request->tipo_cuenta) && isset($request->busqueda) ) {
            $pcCuentas = $pcCuentas->busqueda($request->tipo_cuenta, $request->busqueda);
            /*
            // de esta manera se puede crear un query con scopes en el modelo
            $pcCuentas = $this->pcClaseRepository->scopeQuery(function($query){
                return $query->orderBy('codigo','asc');
            })->busqueda($request->busqueda)->paginate(15);
            */
        }
        //si hay un request con el nombre listaid se envia el parametro para realizar la busqueda de todos los registros que tengan la llave foranea con ese valor
        if ( isset($request->tipo_cuenta) && isset($request->listaid) ) {
            $pcCuentas = $pcCuentas->listaid($request->tipo_cuenta, $request->listaid);
        }
        // guarda un mensaje en el archivo de log
        if( count($pcCuentas) == 0 ){
            Log::info('Clases, Index, Lista de clases sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('Clases, Index, Mostrando lista de clases: '.$request->fullUrl() );
        }

        //$pcCuentas = $pcCuentas->orderBy('codigo', 'asc')->paginate(15);
        if ( isset($request->tipo_cuenta) || isset($request->listaid) || isset($request->busqueda) ) {
            $pcCuentas = $pcCuentas->orderBy('codigo', 'asc')->orderBy('nombre', 'asc')->paginate(15);
        }else{
            $pcCuentas = $pcCuentas->ordenarPor(array('codigo' => 'asc', 'nombre' => 'asc'))->paginate(15);
        }

        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'clases', 'nombre' => 'clase', 'pcCuentas' => $pcCuentas]);
    }

    /**
     * Show the form for creating a new pc_clase.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Clases, Create, Mostrando formulario de creacion de clases');
        return view('admin.pc.pcCuentas.create', ['peticion' => $this->peticion, 'ruta' => 'clases', 'nombre' => 'clase']);
    }

    /**
     * Store a newly created pc_clase in storage.
     *
     * @param Createpc_claseRequest $request
     *
     * @return Response
     */
    public function store(Createpc_claseRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:pc_clase,codigo,NULL,tipo,tipo,' .$request->tipo
        ]);

        $input = $request->all();

        $this->pcCuenta = $this->pcClaseRepository->create($input);
        // guarda un mensaje en el archivo de log
        Log::info('Clases, Store, Se almaceno la clase: '.$this->pcCuenta->id, [$input]);

        Flash::success('Clase guardada correctamente.');

        return redirect(route('admin.pc.clases.show',['id' => $this->pcCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Display the specified pc_clase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Clase no encontrada.');
            // guarda un mensaje en el archivo de log
            Log::notice('Clases, Show, Clase no encontrada, id: '.$id);

            return redirect(route('admin.pc.clases.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Clases, Show, Mostrando clase, id: '.$id);
        
        return view('admin.pc.pcCuentas.show', ['peticion' => $this->peticion, 'ruta' => 'clases', 'nombre' => 'clase', 'pcCuenta' => $this->pcCuenta]);
    }

    /**
     * Show the form for editing the specified pc_clase.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Clase no encontrada.');
            // guarda un mensaje en el archivo de log
            Log::notice('Clases, Edit, Clase no encontrada: '.$id);

            return redirect(route('admin.pc.cuentas.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Clases, Edit, Mostrando edicion de clase: '.$id);

        return view('admin.pc.pcCuentas.edit', ['peticion' => $this->peticion, 'ruta' => 'clases', 'nombre' => 'clase', 'pcCuenta' => $this->pcCuenta]);
    }

    /**
     * Update the specified pc_clase in storage.
     *
     * @param  int              $id
     * @param Updatepc_claseRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepc_claseRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            //'codigo' => 'unique:pc_clase,codigo,'.$id
            'codigo' => 'unique:pc_clase,codigo,'.$id.',id,tipo,' .$request->tipo
        ]);

        if (empty($this->pcCuenta)) {
            Flash::error('Clase no encontrada.');
            // guarda un mensaje en el archivo de log
            Log::notice('Clases, Update, Clase no encontrada: '.$id);

            return redirect(route('admin.pc.clases.index'));
        }

        $this->pcCuenta = $this->pcClaseRepository->update($request->all(), $id);

        Flash::success('Clase actualizada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('Clases, Update, Clase actualizada correctamente: '.$id, [$request->all()]);

        //return redirect(route('admin.pc.clases.index'));
        return redirect(route('admin.pc.clases.show',['id' => $this->pcCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Remove the specified pc_clase from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Clase no encontrada.');
            // guarda un mensaje en el archivo de log
            Log::notice('Clases, Destroy, Clase no encontrada: '.$id);

            return redirect(route('admin.pc.clases.index'));
        }
        if ($this->pcCuenta->grupos()->count() > 0 ) {
            Flash::error('La clase tiene dependencias, no se puede eliminar.');
            // guarda un mensaje en el archivo de log
            Log::error('Clases, Destroy, La clase tiene dependencias, no se puede eliminar: '.$id);

            return redirect(route('admin.pc.clases.show',['id' => $id, 'peticion' => $this->peticion ]) );
        }

        $this->pcClaseRepository->delete($id);

        Flash::success('Clase eliminada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('Clases, Destroy, Clase eliminada correctamente: '.$id);

        return redirect(route('admin.pc.clases.index'));
    }
}
