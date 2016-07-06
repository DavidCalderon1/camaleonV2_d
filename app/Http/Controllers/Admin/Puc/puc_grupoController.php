<?php

namespace App\Http\Controllers\Admin\Puc;

use App\Http\Requests;
use App\Http\Requests\Admin\Puc\Createpuc_grupoRequest;
use App\Http\Requests\Admin\Puc\Updatepuc_grupoRequest;
use App\Repositories\Admin\Puc\puc_grupoRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use App\Models\Admin\Puc\puc_clase;
// esta libreria va a dar la facilidad de obtener parametros que se encuentran en nuestra ruta
use Illuminate\Routing\Route;
use Log;

class puc_grupoController extends \App\Http\Controllers\AppBaseController
{
    /** @var  puc_grupoRepository */
    private $pucGrupoRepository;
    private $listClases;
    private $pucCuenta;
    private $peticion;

    public function __construct(puc_grupoRepository $pucGrupoRepo, Request $request)
    {
        $this->pucGrupoRepository = $pucGrupoRepo;
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
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso es 'grupos' el configurado en las rutas
        $this->pucCuenta = $this->pucGrupoRepository->findWithoutFail( $route->getParameter('grupos') );
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function selection(){
        //se lista el nombre y el id correspondiente a todas las puc_clase
        $this->listClases =  puc_clase::select(DB::raw("CONCAT(codigo, ' - ', nombre) as nombre, id"))->orderBy('id', 'asc')->lists('nombre','id');
    }

    /**
     * Display a listing of the puc_grupo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pucGrupoRepository->pushCriteria(new RequestCriteria($request));
        $pucCuentas = $this->pucGrupoRepository;
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
            Log::info('Grupos, Index, Lista de grupos sin resultados: '.$request->fullUrl() );
        }else{
            Log::info('Grupos, Index, Mostrando lista de grupos: '.$request->fullUrl() );
        }

        $pucCuentas = $pucCuentas->orderBy('codigo', 'asc')->paginate(15);
        return view($vista, ['peticion' => $this->peticion, 'ruta' => 'grupos', 'nombre' => 'grupo', 'pucCuentas' => $pucCuentas]);
    }

    /**
     * Show the form for creating a new puc_grupo.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Grupos, Create, Mostrando formulario de creación de grupos');
        return view('admin.puc.pucCuentas.create', ['peticion' => $this->peticion, 'ruta' => 'grupos', 'nombre' => 'grupo', 'listClases' => $this->listClases]);
    }

    /**
     * Store a newly created puc_grupo in storage.
     *
     * @param Createpuc_grupoRequest $request
     *
     * @return Response
     */
    public function store(Createpuc_grupoRequest $request)
    {
        $input = $request->all();

        $this->pucCuenta = $this->pucGrupoRepository->create($input);
        // guarda un mensaje en el archivo de log
        Log::info('Grupos, Store, Se almaceno el grupo: '.$this->pucCuenta->id, [$input]);
        
        Flash::success('Grupo guardado correctamente.');

		return redirect(route('admin.puc.grupos.show',['id' => $this->pucCuenta->id, 'peticion' => $this->peticion ]) );
    }

    /**
     * Display the specified puc_grupo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Grupo no encontrado.');
            // guarda un mensaje en el archivo de log
            Log::notice('Grupos, Show, Grupo no encontrado, id: '.$id);

            return redirect(route('admin.puc.grupos.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Grupos, Show, Mostrando grupo, id: '.$id);

        return view('admin.puc.pucCuentas.show', ['peticion' => $this->peticion, 'ruta' => 'grupos', 'nombre' => 'grupo', 'pucCuenta' => $this->pucCuenta] );
    }

    /**
     * Show the form for editing the specified puc_grupo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Grupo no encontrado.');
            // guarda un mensaje en el archivo de log
            Log::notice('Grupos, Edit, Grupo no encontrado: '.$id);

            return redirect(route('admin.puc.grupos.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Grupos, Edit, Mostrando edición de grupo: '.$id);

        return view('admin.puc.pucCuentas.edit', ['peticion' => $this->peticion, 'ruta' => 'grupos', 'nombre' => 'grupo', 'pucCuenta' => $this->pucCuenta, 'listClases' => $this->listClases]);
    }

    /**
     * Update the specified puc_grupo in storage.
     *
     * @param  int              $id
     * @param Updatepuc_grupoRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepuc_grupoRequest $request)
    {
		//consulta si existe un registro con el codigo enviado
		$consultaId = $this->pucGrupoRepository->findWithoutFail($request->codigo);

        if (empty($this->pucCuenta)) {
            Flash::error('Grupo no encontrado.');
            // guarda un mensaje en el archivo de log
            Log::notice('Grupos, Update, Grupo no encontrado: '.$id);
            return redirect(route('admin.puc.grupos.index'));
        }
		//valida que no exista un registro con el mismo codigo
		if( count($consultaId) > 0 && $this->pucCuenta->codigo != $request->codigo ){
			Flash::error('Ya existe un Grupo con ese Código.');
            // guarda un mensaje en el archivo de log
            Log::error('Grupos, Update, Ya existe un Grupo con ese Código: '.$id, [$request->all()] );
				
			//regresa al formulario de actualizacion del recurso
			return redirect(route( 'admin.puc.grupos.edit',['id' => $id] ));
				
		}

        $this->pucCuenta = $this->pucGrupoRepository->update($request->all(), $id);

        Flash::success('Grupo actualizado correctamente.');
        // guarda un mensaje en el archivo de log
        Log::info('Grupos, Update, Grupo actualizado correctamente: '.$id, [$request->all()]);

        //return redirect(route('admin.puc.grupos.index'));
		return redirect(route('admin.puc.grupos.show',['id' => $this->pucCuenta->id, 'peticion' => $this->peticion ] ) );
    }

    /**
     * Remove the specified puc_grupo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->pucCuenta)) {
            Flash::error('Grupo no encontrado.');
            // guarda un mensaje en el archivo de log
            Log::notice('Grupos, Destroy, Grupo no encontrado: '.$id);

            return redirect(route('admin.puc.grupos.index'));
        }

        $this->pucGrupoRepository->delete($id);

        Flash::success('Grupo eliminado correctamente.');
        // guarda un mensaje en el archivo de log
        Log::warning('Grupos, Destroy, Grupo eliminado correctamente: '.$id);

        return redirect(route('admin.puc.grupos.index'));
    }
}
