<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Admin\Permission\CreatePermissionRequest;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Routing\Route;
use App\Models\Admin\Permission;
use Log;

class PermissionController extends \App\Http\Controllers\AppBaseController
{
    private $permissions;
    
    public function __construct(Request $request)
    {
        //filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo en el que se desea ejecutar
        $this->beforeFilter('@find',['only' => ['edit','show','update','destroy'] ]);
    }
    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function find(Route $route){
        //va a buscar los parametros que estan en esta ruta y que son enviados por el recurso, que es el configurado en las rutas
        $this->permissions = Permission::find( intval( $route->getParameter('permisos') ) );
    }

    /**
     * Display a listing of the Roles.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $permissions = Permission::orderBy('id', 'asc')->paginate(15);

        Log::info('Permisos, Index, Mostrando lista de permisos: '.$request->fullUrl() );

        return view('admin.roles.index', ['datos' => $permissions, 'ruta' => 'permisos', 'nombre' => 'permisos']);

    }

    /**
     * Show the form for creating a new Roles.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Permisos, Create, Mostrando formulario de creación de Permisos');
        return view('admin.roles.create', ['ruta' => 'permisos', 'nombre' => 'permisos', 'accion' => 'create']);
    }

    /**
     * Store a newly created Roles in storage.
     *
     * @param CreateRolesRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request)
    {
        //crea el permiso con los datos recibidos
        $this->permissions = Permission::create($request->all());
        // guarda un mensaje en el archivo de log
        Log::info('Permisos, Store, Se almaceno el permiso: '.$this->permissions->id, [$request->all()]);
        Flash::success('Permiso creado correctamente.');

        return redirect(route('admin.permisos.show',['id' => $this->permissions->id]) );
    }

    /**
     * Display the specified .
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->permissions)) {
            // guarda un mensaje en el archivo de log
            Log::notice('Permisos, Show, permiso no encontrado, id: '.$id);
            Flash::error('Permiso no encontrado.');

            return redirect(route('admin.permisos.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Permisos, Show, Mostrando rol, id: '.$id);

        return view('admin.roles.show', ['peticion' => 'normal', 'ruta' => 'permisos', 'nombre' => 'permiso', 'datos' => $this->permissions]);
    }

    /**
     * Show the form for editing the specified Roles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->permissions)) {
            // guarda un mensaje en el archivo de log
            Log::notice('Permisos, Edit, permiso no encontrado: '.$id);
            Flash::error('Permiso no encontrado.');

            return redirect(route('admin.permisos.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Permisos, Edit, Mostrando formulario de edición de permiso: '.$id);

        return view('admin.roles.edit', ['datos' => $this->permissions, 'ruta' => 'permisos', 'nombre' => 'permisos', 'accion' => 'edit']);
    }

    /**
     * Update the specified Roles in storage.
     *
     * @param  int              $id
     * @param UpdateRolesRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        // realiza la validacion de las reglas antes de actualizar
        $this->validate($request, [
            'permission_title' => 'required',
            'permission_slug' => 'required|regex:/^[a-zA-Z0-9_]+$/|unique:permissions,permission_slug,'.$id
        ]);

        if (empty($this->permissions)) {
            // guarda un mensaje en el archivo de log
            Log::notice('Permisos, Update, permiso no encontrado: '.$id);
            Flash::error('Permiso no encontrado.');

            return redirect(route('admin.permisos.index'));
        }

        //almacenar la actualizacion que realiza el usuario, de acuerdo a los campos fillable
        $this->permissions->fill($request->all());
        //guardar el usuario
        $this->permissions->save();

        // guarda un mensaje en el archivo de log
        Log::info('Permisos, Update, permiso actualizado correctamente: '.$id, [$request->all()]);
        Flash::success('Permiso actualizado correctamente.');

        return redirect(route('admin.permisos.show',['id' => $this->permissions->id]) );
    }

    /**
     * Remove the specified Roles from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->permissions)) {
            // guarda un mensaje en el archivo de log
            Log::notice('Permisos, Destroy, permiso no encontrado: '.$id);
            Flash::error('Permiso no encontrado.');

            return redirect(route('admin.permisos.index'));
        }

        $this->permissions->delete();

        // guarda un mensaje en el archivo de log
        Log::warning('Permisos, Destroy, permiso eliminado correctamente: '.$id);
        Flash::success('Permiso eliminado correctamente.');

        return redirect(route('admin.permisos.index'));
    }
}
