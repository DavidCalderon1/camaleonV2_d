<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Admin\Role\CreateRoleRequest;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Routing\Route;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Log;

class RoleController extends \App\Http\Controllers\AppBaseController
{
    private $listPermissions;
    private $permissions;
    private $roles;

    public function __construct(Request $request)
    {
        //filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo en el que se desea ejecutar
        $this->beforeFilter('@find',['only' => ['edit','show','update','destroy'] ]);
        $this->beforeFilter('@findPermission',['only' => ['store','update'] ]);
        $this->beforeFilter('@selection',['only' => ['create','edit'] ]);
    }
    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function find(Route $route){
        //va a buscar los parametros que estan en esta ruta y que son enviados por el recurso, que es el configurado en las rutas
        $this->roles = Role::find( intval( $route->getParameter('roles') ) );
    }
    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function findPermission(Route $route, Request $request){
        //busca los registros recibidos
        $this->permissions = Permission::find($request->input('Permissions'));
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function selection(){
        //se listan los campos correspondientes
        $this->listPermissions =  Permission::select('permission_title', 'id')->orderBy('id', 'asc')->lists('permission_title','id');
    }

    /**
     * Display a listing of the Roles.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'asc')->paginate(15);

        Log::info('Roles, Index, Mostrando lista de roles: '.$request->fullUrl() );

        return view('admin.roles.index', ['datos' => $roles, 'ruta' => 'roles', 'nombre' => 'roles']);

    }

    /**
     * Show the form for creating a new Roles.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Roles, Create, Mostrando formulario de creación de Roles');
        return view('admin.roles.create', ['listPermissions' => $this->listPermissions, 'ruta' => 'roles', 'nombre' => 'roles', 'accion' => 'create']);
    }

    /**
     * Store a newly created Roles in storage.
     *
     * @param CreateRolesRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        //crea el rol con los datos recibidos
        $this->roles = Role::create($request->all());
        //crea los registros para las relaciones de los permisos
        $this->roles->permissions()->sync($this->permissions);
        // guarda un mensaje en el archivo de log
        Log::info('Roles, Store, Se almaceno el rol: '.$this->roles->id, [$request->all()]);
        Flash::success('Rol creado correctamente.');

        return redirect(route('admin.roles.show',['id' => $this->roles->id]) );
    }

    /**
     * Display the specified Roles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if (empty($this->roles)) {
            // guarda un mensaje en el archivo de log
            Log::notice('Roles, Show, rol no encontrado, id: '.$id);
            Flash::error('Rol no encontrado.');

            return redirect(route('admin.roles.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Roles, Show, Mostrando rol, id: '.$id);

        return view('admin.roles.show', ['peticion' => 'normal', 'ruta' => 'roles', 'nombre' => 'rol', 'datos' => $this->roles]);
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
        if (empty($this->roles)) {
            // guarda un mensaje en el archivo de log
            Log::notice('Roles, Edit, rol no encontrado: '.$id);
            Flash::error('Rol no encontrado.');

            return redirect(route('admin.roles.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Roles, Edit, Mostrando formulario de edición de rol: '.$id);

        return view('admin.roles.edit', ['datos' => $this->roles, 'listPermissions' => $this->listPermissions, 'ruta' => 'roles', 'nombre' => 'roles', 'accion' => 'edit']);
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
            'role_title' => 'required',
            'role_slug' => 'required|regex:/^[a-zA-Z0-9_]+$/|unique:roles,role_slug,'.$id
        ]);

        if (empty($this->roles)) {
            // guarda un mensaje en el archivo de log
            Log::notice('Roles, Update, rol no encontrado: '.$id);
            Flash::error('Rol no encontrado.');

            return redirect(route('admin.roles.index'));
        }

        //sincroniza los permisos que escoge el usuario
        $this->roles->permissions()->sync($this->permissions);
        //almacenar la actualizacion que realiza el usuario, de acuerdo a los campos fillable
        $this->roles->fill($request->all());
        //guardar el usuario
        $this->roles->save();

        // guarda un mensaje en el archivo de log
        Log::info('Roles, Update, rol actualizado correctamente: '.$id, [$request->all()]);
        Flash::success('Rol actualizado correctamente.');

        return redirect(route('admin.roles.show',['id' => $this->roles->id]) );
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
        if (empty($this->roles)) {
            // guarda un mensaje en el archivo de log
            Log::notice('Roles, Destroy, rol no encontrado: '.$id);
            Flash::error('Rol no encontrado.');

            return redirect(route('admin.roles.index'));
        }

        $this->roles->delete();

        // guarda un mensaje en el archivo de log
        Log::warning('Roles, Destroy, rol eliminado correctamente: '.$id);
        Flash::success('Rol eliminado correctamente.');

        return redirect(route('admin.roles.index'));
    }
}
