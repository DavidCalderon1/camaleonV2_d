<?php

namespace App\Http\Controllers\Admin\Pc;

use App\Http\Requests;
use App\Http\Requests\Admin\Pc\Createpc_cuentaauxiliarRequest;
use App\Http\Requests\Admin\Pc\Updatepc_cuentaauxiliarRequest;
use App\Repositories\Admin\Pc\pc_cuentaauxiliarRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

class pc_cuentaauxiliarController extends \App\Http\Controllers\AppBaseController
{
    /** @var  pc_cuentaauxiliarRepository */
    private $pcCuentaauxiliarRepository;
    private $pcCuenta;
    private $peticion;

    public function __construct(pc_cuentaauxiliarRepository $pcCuentaauxiliarRepo, Request $request)
    {
        $this->pcCuentaauxiliarRepository = $pcCuentaauxiliarRepo;
        //filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo en el que se desea ejecutar
        $this->beforeFilter('@find',['only' => ['edit','show','update','destroy'] ]);
        $this->beforeFilter('@mayusculas',['only' => ['store','update'] ]);
        $this->peticion = "normal";
        //va a mostrar la vista 'tables' en el caso de ser una peticion de tipo ajax
        if ($request->ajax() || $request->peticion == "ajax") {
            $this->peticion = "ajax";
        }
    }
    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function find(Route $route){
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso es 'cuentasauxiliares' el configurado en las rutas
        $this->pcCuenta = $this->pcCuentaauxiliarRepository->findWithoutFail( intval( $route->getParameter('cuentasauxiliares') ) );
    }
    //metodo mayusculas ejecutado por el metodo beforeFilter dentro del constructor para colocar en mayusculas cada dato
    public function mayusculas(Route $route, Request $request){
        //va a obtener los datos recibidos eceptuando algunos, por ejemplo la descripcion la cual no se debe pasar a mayusculas
        $input = $request->except(['_method','_token','urlDestino','descripcion']);
        foreach ($input as $key => $value) {
            $request[$key] = strtoupper($value);
        }
    }

    /**
     * Display a listing of the pc_cuentaauxiliar.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pcCuentaauxiliarRepository->pushCriteria(new RequestCriteria($request));
        $pcCuentas = $this->pcCuentaauxiliarRepository;
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
            Log::info('Cuentas auxiliares, Index, Lista de cuentas auxiliares sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('Cuentas auxiliares, Index, Mostrando lista de cuentas auxiliares: '.$request->fullUrl() );
        }
        //ordena los campos ya sea por la forma normal o llamando al metodo ordenarPor()
        if ( isset($request->tipo_cuenta) && ( isset($request->listaid) || isset($request->busqueda) ) ) {
            $pcCuentas = $pcCuentas->orderBy('codigo', 'asc')->orderBy('nombre', 'asc')->paginate(15);
        }else{
            $pcCuentas = $pcCuentas->ordenarPor(array('codigo' => 'asc', 'nombre' => 'asc'))->paginate(15);
        }
        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'cuentasauxiliares', 'nombre' => 'cuentas auxiliares', 'pcCuentas' => $pcCuentas]);
    }

    /**
     * Show the form for creating a new pc_cuentaauxiliar.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas auxiliares, Create, Mostrando formulario de creación de cuentas auxiliares');
        return view('admin.pc.pcCuentas.create', ['peticion' => $this->peticion, 'ruta' => 'cuentasauxiliares', 'nombre' => 'cuentas auxiliares']);
    }

    /**
     * Store a newly created pc_cuentaauxiliar in storage.
     *
     * @param Createpc_cuentaauxiliarRequest $request
     *
     * @return Response
     */
    public function store(Createpc_cuentaauxiliarRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:pc_cuentaauxiliar,codigo,NULL,tipo,tipo,' .$request->tipo
        ]);

        $input = $request->all();

        $this->pcCuenta = $this->pcCuentaauxiliarRepository->create($input);
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas auxiliares, Store, Se almaceno la cuenta auxiliar: '.$this->pcCuenta->id, [$input]);

        Flash::success('Cuenta Auxiliar guardada correctamente.');

        return redirect(route('admin.pc.cuentasauxiliares.show',['id' => $this->pcCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Display the specified pc_cuentaauxiliar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Cuenta Auxiliar no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas auxiliares, Show, cuenta auxiliar no encontrada, id: '.$id);

            return redirect(route('admin.pc.cuentasauxiliares.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas auxiliares, Show, Mostrando cuenta auxiliar, id: '.$id);

        return view('admin.pc.pcCuentas.show', ['peticion' => $this->peticion, 'ruta' => 'cuentasauxiliares', 'nombre' => 'cuentas auxiliares', 'pcCuenta' => $this->pcCuenta]);
    }

    /**
     * Show the form for editing the specified pc_cuentaauxiliar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Cuenta Auxiliar no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas auxiliares, Edit, cuenta auxiliar no encontrada: '.$id);

            return redirect(route('admin.pc.cuentasauxiliares.index'));
        }
        //agrega el nombre de la subcuenta
        $this->pcCuenta['cuenta_fk_nombre'] = $this->pcCuenta->subcuentas->codigo . ' - ' . $this->pcCuenta->subcuentas->nombre . ' - ' . $this->pcCuenta->subcuentas->tipo;

        // guarda un mensaje en el archivo de log
        Log::info('Cuentas auxiliares, Edit, Mostrando formulario de edición de cuenta auxiliar: '.$id);

        return view('admin.pc.pcCuentas.edit', ['peticion' => $this->peticion, 'ruta' => 'cuentasauxiliares', 'nombre' => 'cuentas auxiliares', 'pcCuenta' => $this->pcCuenta]);
    
    }

    /**
     * Update the specified pc_cuentaauxiliar in storage.
     *
     * @param  int              $id
     * @param Updatepc_cuentaauxiliarRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepc_cuentaauxiliarRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:pc_cuentaauxiliar,codigo,'.$id.',id,tipo,' .$request->tipo
        ]);

        if (empty($this->pcCuenta)) {
            Flash::error('Cuenta Auxiliar no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas auxiliares, Update, cuenta auxiliar no encontrada: '.$id);

            return redirect(route('admin.pc.cuentasauxiliares.index'));
        }

        $this->pcCuenta = $this->pcCuentaauxiliarRepository->update($request->all(), $id);

        Flash::success('Cuenta Auxiliar actualizada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('Cuentas auxiliares, Update, cuenta auxiliar actualizada correctamente: '.$id, [$request->all()]);

        return redirect(route('admin.pc.cuentasauxiliares.show',['id' => $this->pcCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Remove the specified pc_cuentaauxiliar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Cuenta Auxiliar no encontrada');
            // guarda un mensaje en el archivo de log
            Log::notice('Cuentas auxiliares, Destroy, cuenta auxiliar no encontrada: '.$id);

            return redirect(route('admin.pc.cuentasauxiliares.index'));
        }

        if ($this->pcCuenta->movimiento_contable()->count() > 0 ) {
            Flash::error('La cuenta auxiliar tiene dependencias, no se puede eliminar.');
            // guarda un mensaje en el archivo de log
            Log::error('Cuentas auxiliares, Destroy, La cuenta auxiliar tiene dependencias, no se puede eliminar: '.$id);

            return redirect(route('admin.pc.cuentasauxiliares.show',['id' => $id, 'peticion' => $this->peticion]) );
        }

        $this->pcCuentaauxiliarRepository->delete($id);

        Flash::success('Cuenta Auxiliar eliminada correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('Cuentas auxiliares, Destroy, cuenta auxiliar eliminada correctamente: '.$id);

        return redirect(route('admin.pc.cuentasauxiliares.index'));
    }
}
