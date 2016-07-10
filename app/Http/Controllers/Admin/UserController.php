<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Admin\CreateUserRequest;
use App\User;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Routing\Route;
use Log;

class UserController extends \App\Http\Controllers\AppBaseController
{

    private $listRoles;
    private $users;
    private $roles;

    public function __construct(Request $request)
    {
        //filtro que se ejecutara antes de cualquier accion del controlador, se especifica el metodo en el que se desea ejecutar
        $this->beforeFilter('@find',['only' => ['edit','show','update','destroy'] ]);
        $this->beforeFilter('@findRole',['only' => ['store','update'] ]);
        $this->beforeFilter('@selection',['only' => ['create','edit'] ]);
    }
    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function find(Route $route){
        //va a buscar los parametros que estan el esta ruta y que son enviados por el recurso, que en este caso es 'usuarios' el configurado en las rutas
        $this->user = User::WithTrash( $route->getParameter('usuarios') )->first();
    }
    //metodo find ejecutado por el metodo beforeFilter dentro del constructor
    public function findRole(Route $route, Request $request){
        //busca los roles enviados
        $this->roles = Role::find($request->input('Roles'));
    }
    //metodo selection ejecutado por el metodo beforeFilter dentro del constructor
    public function selection(){
        //se lista el nombre y el id correspondiente a todas las puc_subcuenta
        $this->listRoles =  Role::select('role_title', 'id')->orderBy('id', 'asc')->lists('role_title','id');
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::withTrashed();
        $users = $users->orderBy('name', 'asc')->paginate(15);

        Log::info('Usuarios, Index, Mostrando lista de usuarios: '.$request->fullUrl() );

        return view('admin.usuarios.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        // guarda un mensaje en el archivo de log
        Log::info('Usuarios, Create, Mostrando formulario de creación de usuarios');
        return view('admin.usuarios.create',['listRoles' => $this->listRoles]);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        //crea el usuario con los datos recibidos
        $this->user = User::create($request->all());
        //crea los registros para las relaciones de los roles
        $this->user->roles()->sync($this->roles);

        // guarda un mensaje en el archivo de log
        Log::info('Usuarios, Store, Se almaceno el usuario: '.$this->user->id, [$request->all()]);
        Flash::success('Usuario creado correctamente.');

        return redirect(route('admin.usuarios.show',['id' => $this->user->id]) );
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$user = User::where('id', $id)->withTrashed()->first();

        if (empty($this->user)) {
            // guarda un mensaje en el archivo de log
            Log::notice('Usuarios, Show, usuario no encontrado, id: '.$id);
            Flash::error('Usuario no encontrado.');

            return redirect(route('admin.usuarios.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Usuarios, Show, Mostrando usuario, id: '.$id);

        return view('admin.usuarios.show', ['peticion' => 'normal', 'nombre' => 'usuarios', 'user' => $this->user]);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if (empty($this->user)) {
            // guarda un mensaje en el archivo de log
            Log::notice('Usuarios, Edit, usuario no encontrado, id: '.$id);
            Flash::error('Usuario no encontrado.');

            return redirect(route('admin.usuarios.index'));
        }
        // guarda un mensaje en el archivo de log
        Log::info('Usuarios, Edit, Mostrando formulario de edición de usuario: '.$id);

        return view('admin.usuarios.edit', ['user' => $this->user,'listRoles' => $this->listRoles]);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        if (empty($this->user)) {
            // guarda un mensaje en el archivo de log
            Log::notice('Usuarios, Update, usuario no encontrado, id: '.$id);
            Flash::error('Usuario no encontrado.');

            return redirect(route('admin.usuarios.index'));
        }
        //sincroniza los roles que escoge el usuario
        $this->user->roles()->sync($this->roles);
        //almacenar la actualizacion que realiza el usuario, de acuerdo a los campos fillable
        $this->user->fill($request->all());
        //guardar el usuario
        $this->user->save();

        //valida el campo deleted_at y restaura al usuario en dado caso
        if (isset($request->deleted_at) && $request->deleted_at == '1') {
           $this->user->restore();
        }

        // guarda un mensaje en el archivo de log
        Log::info('Usuarios, Update, usuario actualizado correctamente: '.$id, [$request->all()]);
        Flash::success('Usuario actualizado correctamente.');

        return redirect(route('admin.usuarios.show',['id' => $this->user->id]) );
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (empty($this->user)) {
            // guarda un mensaje en el archivo de log
            Log::notice('Usuarios, Destroy, usuario no encontrado, id: '.$id);
            Flash::error('Usuario no encontrado.');

            return redirect(route('admin.usuarios.index'));
        }

        $this->user->delete();

        // guarda un mensaje en el archivo de log
        Log::warning('Usuarios, Destroy, usuario eliminado correctamente: '.$id);
        Flash::success('Usuario eliminado correctamente.');

        return redirect(route('admin.usuarios.index'));
    }
}
