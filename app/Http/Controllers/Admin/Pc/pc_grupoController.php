<?php

namespace App\Http\Controllers\Admin\Pc;

use App\Http\Requests;
use App\Http\Requests\Admin\Pc\Createpc_grupoRequest;
use App\Http\Requests\Admin\Pc\Updatepc_grupoRequest;
use App\Repositories\Admin\Pc\pc_grupoRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

class pc_grupoController extends \App\Http\Controllers\AppBaseController
{
    /** @var  pc_grupoRepository */
    private $pcGrupoRepository;
    private $pcCuenta;
    private $peticion;

    public function __construct(pc_grupoRepository $pcGrupoRepo, Request $request)
    {
        $this->pcGrupoRepository = $pcGrupoRepo;
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
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso es 'grupos' el configurado en las rutas
        $this->pcCuenta = $this->pcGrupoRepository->findWithoutFail( intval( $route->getParameter('grupos') ) );
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
     * Display a listing of the pc_grupo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pcGrupoRepository->pushCriteria(new RequestCriteria($request));
        $pcCuentas = $this->pcGrupoRepository;
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
            Log::info('Grupos, Index, Lista de grupos sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('Grupos, Index, Mostrando lista de grupos: '.$request->fullUrl() );
        }

        //ordena los campos ya sea por la forma normal o llamando al metodo ordenarPor()
        if ( isset($request->tipo_cuenta) && ( isset($request->listaid) || isset($request->busqueda) ) ) {
            $pcCuentas = $pcCuentas->orderBy('codigo', 'asc')->orderBy('nombre', 'asc')->paginate(15);
        }else{
            $pcCuentas = $pcCuentas->ordenarPor(array('codigo' => 'asc', 'nombre' => 'asc'))->paginate(15);
        }
        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'grupos', 'nombre' => 'grupo', 'pcCuentas' => $pcCuentas]);
    }

    /**
     * Show the form for creating a new pc_grupo.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Grupos, Create, Mostrando formulario de creación de grupos');
        return view('admin.pc.pcCuentas.create', ['peticion' => $this->peticion, 'ruta' => 'grupos', 'nombre' => 'grupo']);
    }

    /**
     * Store a newly created pc_grupo in storage.
     *
     * @param Createpc_grupoRequest $request
     *
     * @return Response
     */
    public function store(Createpc_grupoRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:pc_grupo,codigo,NULL,tipo,tipo,' .$request->tipo
        ]);

        $input = $request->all();

        $this->pcCuenta = $this->pcGrupoRepository->create($input);
        // guarda un mensaje en el archivo de log
        Log::info('Grupos, Store, Se almaceno el grupo: '.$this->pcCuenta->id, [$input]);
        
        Flash::success('Grupo guardado correctamente.');

		return redirect(route('admin.pc.grupos.show',['id' => $this->pcCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Display the specified pc_grupo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Grupo no encontrado.');
            // guarda un mensaje en el archivo de log
            Log::notice('Grupos, Show, Grupo no encontrado, id: '.$id);

            return redirect(route('admin.pc.grupos.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Grupos, Show, Mostrando grupo, id: '.$id);

        return view('admin.pc.pcCuentas.show', ['peticion' => $this->peticion, 'ruta' => 'grupos', 'nombre' => 'grupo', 'pcCuenta' => $this->pcCuenta] );
    }

    /**
     * Show the form for editing the specified pc_grupo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Grupo no encontrado.');
            // guarda un mensaje en el archivo de log
            Log::notice('Grupos, Edit, Grupo no encontrado: '.$id);

            return redirect(route('admin.pc.grupos.index'));
        }

        //agrega el nombre de la clase
        $this->pcCuenta['cuenta_fk_nombre'] = $this->pcCuenta->clases->codigo . ' - ' . $this->pcCuenta->clases->nombre . ' - ' . $this->pcCuenta->clases->tipo;

        // guarda un mensaje en el archivo de log
        Log::info('Grupos, Edit, Mostrando edición de grupo: '.$id);

        return view('admin.pc.pcCuentas.edit', ['peticion' => $this->peticion, 'ruta' => 'grupos', 'nombre' => 'grupo', 'pcCuenta' => $this->pcCuenta]);
    }

    /**
     * Update the specified pc_grupo in storage.
     *
     * @param  int              $id
     * @param Updatepc_grupoRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepc_grupoRequest $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'codigo' => 'unique:pc_grupo,codigo,'.$id.',id,tipo,' .$request->tipo
        ]);

        if (empty($this->pcCuenta)) {
            Flash::error('Grupo no encontrado.');
            // guarda un mensaje en el archivo de log
            Log::notice('Grupos, Update, Grupo no encontrado: '.$id);
            return redirect(route('admin.pc.grupos.index'));
        }

        $this->pcCuenta = $this->pcGrupoRepository->update($request->all(), $id);

        Flash::success('Grupo actualizado correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('Grupos, Update, Grupo actualizado correctamente: '.$id, [$request->all()]);

        //return redirect(route('admin.pc.grupos.index'));
		return redirect(route('admin.pc.grupos.show',['id' => $this->pcCuenta->id, 'peticion' => $this->peticion ] ) );
    }

    /**
     * Remove the specified pc_grupo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->pcCuenta)) {
            Flash::error('Grupo no encontrado.');
            // guarda un mensaje en el archivo de log
            Log::notice('Grupos, Destroy, Grupo no encontrado: '.$id);

            return redirect(route('admin.pc.grupos.index'));
        }
        if ($this->pcCuenta->cuentas()->count() > 0 ) {
            Flash::error('El grupo tiene dependencias, no se puede eliminar.');
            // guarda un mensaje en el archivo de log
            Log::error('Grupos, Destroy, El grupo tiene dependencias, no se puede eliminar: '.$id);

            return redirect(route('admin.pc.grupos.show',['id' => $id, 'peticion' => $this->peticion ]) );
        }

        $this->pcGrupoRepository->delete($id);

        Flash::success('Grupo eliminado correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('Grupos, Destroy, Grupo eliminado correctamente: '.$id);

        return redirect(route('admin.pc.grupos.index'));
    }
}
