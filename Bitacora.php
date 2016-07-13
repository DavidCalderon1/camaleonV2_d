<?php 
Especificar el host y el puerto por el que se quiere iniciar el servidor
	php artisan serve --host=some.other.domain --port=8001
Muesra una lista de los puertos que estan activos
	netstat -p TCP -a -n

Laravel proyecto camaleon
- requisitos segun los casos de uso
	- crear, actualizar y eliminar  grupos, cuentas, subcuentas y cuentas auxiliares
	- ver clases, grupos, cuentas, subcuentas y cuentas auxiliares
	- en los formularios colocar primero el campo codigo referente a la cuenta padre
	- la ruta en la interfaz para la creacion es:  Módulo Administrativo > Manejo de Plan Único de Cuentas > Creación de cuenta
	- la ruta en la url para la creacion es: /admin/puc/.../create
	- despues de la creacion y actualizacion de un registro mostrar la vista de la informacion registrada
	- agregar validaciones y autenticacion, ocultar los accesos por interfaz e impedirlo por url, debera estar registrado y con permisos
	- en la busqueda del puc requerir el tipo de cuenta y con un solo campo de texto buscar por codigo y nombre
	- la ruta en la interfaz para la busqueda es:  Módulo Administrativo > Manejo de Plan Único de Cuentas > Busqueda de cuenta
	- la ruta en la url para la busqueda es: /admin/puc/.../search
	- mostrar un mensaje de que no existen registros de acuerdo a la busqueda
	- la lista de resultados mostraran el codigo, el nombre y un boton para ver el recurso 
	- en la vista del recurso estaran las opciones de edicion y eliminacion del mismo
	- se podria tener dos opciones principales de busqueda, una con el campo de texto y otra con selects dinamicos
	- solo se podran modificar y eliminar cuentas que se hubieran creado por los usuarios del sistema, no las nativas
		- en el caso de tener dependencias en otras cuentas, mostrar un aviso al usuario mencionando que no se puede eliminar o actualizar la cuenta debido a las cuentas dependientes
	
	- autenticacion
		https://laravel.com/docs/5.1/authentication
	- manejo de roles:
		- https://laravel.com/docs/5.1/authorization
		- http://heera.it/laravel-5-1-x-acl-middleware#.V2DuubvhBki
		https://laracasts.com/discuss/channels/general-discussion/roles-and-permissions-in-laravel-5?page=1
		https://medium.com/@yamidvo/tutorial-sistema-de-roles-y-permisos-en-laravel-entrust-a69a8efda3e2#.u4lixi8qv
		http://www.kabytes.com/programacion/roles-y-permisos-para-laravel-5/
		- https://github.com/Zizaco/entrust/tree/laravel-5
		- https://github.com/romanbican/roles
		- https://cartalyst.com/manual/sentinel/2.0#integration
	- validacion 
		https://laravel.com/docs/5.1/validation#form-request-validation
	

- correr el script para crear las tablas: puc_clase, puc_grupo, puc_cuenta, puc_subcuenta, puc_cuentaauxiliar
	- estas tablas ya contienen los campos created_at, updated_at y deleted_at
- correr el script para llenar las tablas creadas con la informacion predefinida: Camaleon_data_puc_con_campos.sql
- ejecutar los comandos para crear el crud a partir de las tablas creadas:
	php artisan infyom:scaffold puc_clase --fromTable --tableName=puc_clase
	php artisan infyom:scaffold puc_grupo --fromTable --tableName=puc_grupo
	php artisan infyom:scaffold puc_cuenta --fromTable --tableName=puc_cuenta
	php artisan infyom:scaffold puc_subcuenta --fromTable --tableName=puc_subcuenta
	php artisan infyom:scaffold puc_cuentaauxiliar --fromTable --tableName=puc_cuentaauxiliar

- las rutas que se han creado y modificado son:
	Route::resource('clases', 'puc_claseController');
	Route::resource('grupos', 'puc_grupoController');
	Route::resource('cuentas', 'puc_cuentaController');
	Route::resource('subcuentas', 'puc_subcuentaController');
	Route::resource('cuentasauxiliares', 'puc_cuentaauxiliarController');
	
- se crean los directorios para los archivos de cada modulo: controllers, requests, models, repositories, views
	- en el caso de PUC: \Admin\Puc
	
- se crean las url por medio de Route::group para los modulos
	- todo lo que tenga rutas debe ser modificado, normalmente son las vistas y los controladores unicamente 
	- las url se estan dejando todas en minusculas y los namespace o directorios con la primera letra en mayuscula
	- en el caso de PUC: 
		url: /admin/puc/
		directorios: \Admin\Puc\

- en el Route::group de las rutas, al cambiar de namespace se debe: 
	- mover el controlador a la carpeta correcta
	- actualizar la ruta del namespace en el controlador
	- actualizar el ruta del namespace en la creacion de la clase del controlador

- para actualizar completamente el crud de otro recurso se requiere comparar y realizar las modificaciones entre:
	- controllers
	- requests
	- resources
	- models
	- repositories
	- views

- se coloca la paginacion en 5 registros para cada uno de los modelos
	- se modifican los controladores de cada uno, en el metodo index se cambia el valor ->all(); por ->paginate(5);
		puc_claseController
		puc_grupoController
		puc_cuentaController
		puc_subcuentaController
		puc_cuentaauxiliarController
	- se modifican las vistas index de cada uno, justo debajo de la instruccion @include('[$directorio$].table') colocar la instruccion {!! $[$variable$]->render() !!}
		admin.puc.pucClases.index 
			@include('pucClases.table')
			{!! $pucClases->render() !!}
			...
		
- se pueden editar los tamaños de los botones 
	http://www.w3schools.com/bootstrap/bootstrap_ref_css_buttons.asp
	
- se pueden editar los iconos de los botones 
	http://www.w3schools.com/bootstrap/bootstrap_ref_comp_glyphs.asp
	http://www.w3schools.com/icons/fontawesome_icons_form.asp
	http://www.w3schools.com/bootstrap/bootstrap_badges_labels.asp
	
- se modificaron todas las vistas create, edit, index y show con la instruccion @extends('layouts.principal')
	- esto debido a que se obtubo un layout con un menu lateral
	
- agregar las restricciones a los campos de acuerdo a la definicion en la base de datos, si es not null, si es FK o PK
	- tener en cuenta la longitud del campo
	
- verificar los campos que estan en fillable para que no salgan errores al momento de guardar

- en el archivo /resources/lang/es/validation.php estan las validaciones para cada caso
	- se pueden modificar o agregar mensajes personalizados
		//
		...
		'required'             => 'El campo :attribute es obligatorio.',
		...
		//
	- se pueden agregar 'traducciones' para los nombres de los campos
		//
		...
		'attributes'           => [
			'name'                  => 'nombre',
		...
		//
		
- modificar los campos de llaves foraneas por selects
	//ejemplo	
	//vista /pucGrupos/fields
	{!! Form::label('codigo', 'Código:') !!}
	{!! Form::select('codigo', $pucClase, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una clase' ])!!}
	
- en el controlador incluir el/los modelo/s de las tablas de referencia de las llaves foraneas
	//ejemplo
		
		use App\Models\puc_clase;
		
	- modificar el metodo create
		//ejemplo
		//se lista el nombre y el id correspondiente a todos las puc_clase
				$pucClase = puc_clase::lists('nombre', 'codigo');
				return view('pucGrupos.create',compact('pucClase'));
	
- se crear la validacion para el momento de actualizar un registro, metodo update()
	- se debe crear una consulta por el id enviado y luego validar que no exista o que no sea diferente al actual
		
		//consulta si existe un registro con el codigo enviado
		$consultaId = $this->cuentaGrupoRepository->findWithoutFail($request->codigo);
		
		//valida que no exista un registro con el mismo codigo
		if( count($consultaId) > 0 && $id !== $request->codigo ){
			Flash::error('Ya existe un Grupo con ese Id');
			//Flash::error($id.' Ya existe un Grupo con ese Id'. count($pucGrupo) .' - '.$request->codigo .' - '.count($grupoNuevo)  );
			//url() .'/'. $request->path() .'/edit'
			
			//regresa al formulario de actualizacion del recurso
            return redirect(route( 'admin.puc.grupos.edit',['id' => $id] ));
            //return redirect(route( 'admin.puc.grupos.index'));
		}

	
- revizar el texto de las vistas y de los mensajes al usuario, que sea coherente y en español	
- ordenar los campos en el modelo, en el request y en las vistas para que salgan las validaciones en un orden mas logico
- en las vistas colocar los elementos html correctos segun los requisitos de los campos, text, number select 
- agregar la instruccion @include('flash::message') en vistas como la de edit para que muestre el retorno del controlador
- ajustar la vista de todos los recursos para que salga la llave primaria cuando ésta es editable
- cambiar el mensaje de alerta de confirmacion de eliminacion por un mensaje de tipo modal

- revizar eloquent para usarlo desde el modelo y hacer un llamado sencillo desde el controlador
- ordenar las consultas por el campo representativo
- añadir una validacion de seguridad a los campos por defecto, se podria colocar el campo created_at con el valor '0001-01-01 00:00:00' evitar que se actualicen o eliminen los campos con esa fecha de creacion
- al mostrar las llaves foraneas concatenar el id(si se requiere verlo) y el nombre o en el caso de los tipo boolean mostrar una palabra ilustrativa
- al crear y tambien al actualizar un recurso redireccionar a la vista del recurso creado
- intentar guardar la url de la lista de todos los recursos al elegir las opciones de ver, editar o eliminar el recurso, para devolverlo al mismo punto
- revizar la opcion de ir a la opcion de menu a partir de la url y mostrarla seleccionada
- contemplar la opcion de incorporar un solo boton en la lista de los recursos que aparezca 'Editar' y en el formulario de edicion incorporar la opcion de eliminar, esto posiblemente reduzca las validaciones

- se crearon unas consultas para llenar las tablas con la nueva estructura
	
			/* tabla puc_clase */
			INSERT INTO puc_clase 
			(codigo, nombre, descripcion, ajuste, naturaleza)
			SELECT codigo, nombre, descripcion, ajuste, naturaleza
			FROM apuc_clase
			ORDER BY codigo ASC

			/* tabla puc_grupo */
			INSERT INTO puc_grupo 
			(codigo, nombre, descripcion, ajuste, nativa, clase_id)
			SELECT g.codigo, g.nombre, g.descripcion, g.ajuste, '1', cast(c.id as int)
			FROM apuc_grupo g join puc_clase c on(g.clase_id=c.codigo)
			ORDER BY g.codigo ASC

			/* tabla puc_cuenta */
			INSERT INTO puc_cuenta 
			(codigo, nombre, descripcion, ajuste, nativa, grupo_id)
			SELECT c.codigo, c.nombre, c.descripcion, c.ajuste, '1', cast(g.id as int)
			FROM apuc_cuenta c join puc_grupo g on(c.grupo_id=g.codigo)
			ORDER BY c.codigo ASC

			/* tabla puc_subcuenta */
			INSERT INTO puc_subcuenta 
			(codigo, nombre, descripcion, ajuste, nativa, cuenta_id)
			SELECT s.codigo, s.nombre, s.descripcion, s.ajuste, '1', cast(c.id as int)
			FROM apuc_subcuenta s join puc_cuenta c on(s.cuenta_id=c.codigo)
			ORDER BY s.codigo ASC

			/* actualizar el campo created_at de todas las tablas puc_ */

			update puc_clase set created_at = '0001-01-01 01:01:01';
			update puc_grupo set created_at = '0001-01-01 01:01:01';
			update puc_cuenta set created_at = '0001-01-01 01:01:01';
			update puc_subcuenta set created_at = '0001-01-01 01:01:01';
			update puc_cuentaauxiliar set created_at = '0001-01-01 01:01:01';
			
			
- se creo un archivo en la carpeta /config llamado 'options' y en el se creo un array con el nombre 'types_puc' y se ingresaron los tipos de puc para volcarlos en los select con el parametro config('options.puc_types'),
			
- se modifican las vistas para que sean utiles para todas las cuentas puc
- configurar las relaciones hasmany ... para las vistas de cada registro
    //modelo puc_clase
    // cada clase tiene muchos grupos
    public function grupos() {
        return $this->hasMany('App\Models\Admin\Puc\puc_grupo','clase_id','id');
    }
    
    //modelo puc_grupo
	// cada grupo tiene una clase
    public function clases() {
		//return $this->belongsTo('model_target','foreign_key','relation');
        return $this->belongsTo('App\Models\Admin\Puc\puc_clase','clase_id','id');
    }
	
- concatenar columnas para volcar en un select
	use DB;
	...
	//se lista el nombre y el id correspondiente a todos los puc_cuenta
    $this->listCuentas =  puc_cuenta::select(DB::raw("CONCAT(codigo, ' - ', nombre) as nombre"), "id")->orderBy('id', 'asc')->lists('nombre','id');
		
- se agrego una funcion en el repositorio de cada cuenta para ingresar los parametros de busqueda
	public function busqueda($busqueda)
    {
        return $this->model->where('codigo', 'like', '%'.strtoupper($busqueda).'%')->orWhere('nombre', 'like', '%'.strtoupper($busqueda).'%');
        
    }
	
	
- modificar la configuracion de postgresql para poder ver un log de las consultas realizadas
		Edit your /etc/postgresql/9.3/main/postgresql.conf, and change the lines as follows.

		Note: If you didn´t find the postgresql.conf file, then just type $locate postgresql.conf in a terminal

		#log_destination = 'syslog' to log_directory = 'pg_log'
		
		
		
		#log_directory = 'pg_log' to log_directory = 'pg_log'
		#log_filename = 'postgresql-%Y-%m-%d_%H%M%S.log' to log_filename = 'postgresql-%Y-%m-%d_%H%M%S.log'
		#log_statement = 'none' to log_statement = 'all'
		#logging_collector = off to logging_collector = on
		Optional: SELECT set_config('log_statement', 'all', true);
		sudo /etc/init.d/postgresql restart or sudo service postgresql restart
		Fire query in postgresql select 2+2
		Find current log in /var/lib/pgsql/9.2/data/pg_log/
		
		

- SOLUCIONADO: hace falta configurar la paginacion		
- hace falta configurar el cache o devolver los datos al formulario
- SOLUCIONADO: hace falta configurar el modal para los select
- SOLUCIONADO: hace falta configurar la pantalla de 'Cargando...' para todos los botones o links que lo ameriten: ver, editar, guardar, buscar, eliminar ...
	- se puede hacer con un modal
	- se hizo para que se muestre en toda la pantalla al ejecutar una peticion ajax
- SOLUCIONADO: hace falta unificar los script, determinar los parametros comunes y en lo posible dejar solo uno para todas las peticiones ajax
- SOLUCIONADO: hace falta configurar botones y motrar las respuestas para todas las peticiones ajax
- SOLUCIONADO: hace falta configurar el funcionamientos de todos los modelos, como el de puc_grupos


- configurar la autenticacion
	php artisan infyom.publish:layout
	
	- se crearon las siguientes rutas:
		Route::get('login', 'Auth\AuthController@getLogin');
		Route::post('login', 'Auth\AuthController@postLogin');
		Route::get('logout', 'Auth\AuthController@getLogout');

		// Registration Routes...
		Route::get('register', 'Auth\AuthController@getRegister');
		Route::post('register', 'Auth\AuthController@postRegister');

		// Password Reset Routes...
		Route::get('password/reset', 'Auth\PasswordController@getEmail');
		Route::post('password/email', 'Auth\PasswordController@postEmail');
		Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
		Route::post('password/reset', 'Auth\PasswordController@postReset');

		Route::get('/home', 'HomeController@index');
	
	- en el archivo app/Http/Middleware/Authenticate.php
		cambiar la instruccion: return redirect()->guest('auth/login');
		por: return redirect()->guest('/login');
		
	- en el archivo: app/Http/Controllers/Auth/AuthController.php
		dentro y al inicio de la clase colocar lo siguiente:
			protected $loginPath = '/login';
			protected $redirectTo = '/home';
			protected $redirectAfterLogout = '/login';
			
	- para que el menu funcione y se agreguen los modelos creados se modifica el archivo: config/infyom/laravel_generator.php
		se habilita el uso del menu:
		'add_on' => [ 
		   ...
			'menu' => [
				 'enabled' => true ] ]
				 
	- para integrarlo con los modelos que ya estan solo es necesario que en las vistas se modifique la intruccion extends:
		@extends('layouts.app')
		
	- la vista del menu esta en layouts/menu.blade.php
				 
- configurar los roles de usuario
	http://heera.it/laravel-5-1-x-acl-middleware#.V2DuubvhBki
	- modificar la migracion de la tabla users:
		 public function up()
		{
			Schema::create('users', function (Blueprint $table) {
				$table->increments('id')->unsigned();
				$table->string('name');
				$table->string('email')->unique();
				$table->string('password', 60);
				$table->rememberToken();
				$table->timestamps();
				$table->softdeletes();
			});
		}
	- crear la tabla roles
		php artisan make:migration create_roles_table
		
		- modificar la migracion de la tabla roles
			public function up()
			{
				Schema::create('roles', function(Blueprint $table)
				{

					$table->increments('id');
					$table->string('role_title');
					$table->string('role_slug');
				});
			}

			/**
			 * Reverse the migrations.
			 *
			 * @return void
			 */
			public function down()
			{
				Schema::drop('roles');
			}
			
	- crear la tabla permissions 
		php artisan make:migration create_permissions_table
		
		- modificar la migracion de la tabla permissions
			public function up()
			{
				Schema::create('permissions', function(Blueprint $table)
				{
					$table->increments('id');
					$table->string('permission_title');
					$table->string('permission_slug');
					$table->string('permission_description')->nullable();
				});
			}

			/**
			 * Reverse the migrations.
			 *
			 * @return void
			 */
			public function down()
			{
				Schema::drop('permissions');
			}
			
	- crear la tabla permission_role 
		php artisan make:migration create_permission_role_table
		
		- modificar la migracion de la tabla permission_role
			public function up()
			{
				Schema::create('permission_role', function(Blueprint $table)
				{
					$table->increments('id');
					$table->integer('permission_id');
					$table->integer('role_id');
				});
			}

			/**
			 * Reverse the migrations.
			 *
			 * @return void
			 */
			public function down()
			{
				Schema::drop('permission_role');
			}
			
			
	- crear la tabla role_user  
		php artisan make:migration create_role_user_table
		
		- modificar la migracion de la tabla role_user
			public function up()
			{
				Schema::create('role_user', function(Blueprint $table)
				{
					$table->increments('id');
					$table->integer('role_id');
					$table->integer('user_id');
				});
			}

			/**
			 * Reverse the migrations.
			 *
			 * @return void
			 */
			public function down()
			{
				Schema::drop('role_user');
			}
			
	- crear el middleware CheckPermission
		php artisan make:middleware CheckPermission
			
		- modificar el middleware CheckPermission
			public function handle($request, Closure $next, $permission = null)
			{
				if (!app('Illuminate\Contracts\Auth\Guard')->guest()) {

					if ($request->user()->can($permission)) {
						
						return $next($request);
					}
				}

				return $request->ajax ? response('Unauthorized.', 401) : redirect('/login');
			}

	- modificar el modelo User.php	
		use Illuminate\Auth\Authenticatable;
		use Illuminate\Database\Eloquent\Model;
		use Illuminate\Auth\Passwords\CanResetPassword;
		use Illuminate\Database\Eloquent\SoftDeletes;
		use Illuminate\Foundation\Auth\Access\Authorizable;
		use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
		use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
		use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

		class User extends Model implements AuthenticatableContract,
											AuthorizableContract,
											CanResetPasswordContract
		{
			use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

			/**
			 * The database table used by the model.
			 *
			 * @var string
			 */
			protected $table = 'users';

			/**
			 * The attributes that are mass assignable.
			 *
			 * @var array
			 */
			protected $fillable = ['name', 'email', 'password'];

			/**
			 * The attributes excluded from the model's JSON form.
			 *
			 * @var array
			 */
			protected $hidden = ['password', 'remember_token'];

			/*
			|--------------------------------------------------------------------------
			| ACL Methods
			|--------------------------------------------------------------------------
			*/

			/**
			 * Checks a Permission
			 *
			 * @param  String permission Slug of a permission (i.e: manage_user)
			 * @return Boolean true if has permission, otherwise false
			 */
			public function can($permission = null)
			{
				return !is_null($permission) && $this->checkPermission($permission);
			}

			/**
			 * Check if the permission matches with any permission user has
			 *
			 * @param  String permission slug of a permission
			 * @return Boolean true if permission exists, otherwise false
			 */
			protected function checkPermission($perm)
			{
				$permissions = $this->getAllPernissionsFormAllRoles();
				
				$permissionArray = is_array($perm) ? $perm : [$perm];

				return count(array_intersect($permissions, $permissionArray));
			}

			/**
			 * Get all permission slugs from all permissions of all roles
			 *
			 * @return Array of permission slugs
			 */
			protected function getAllPernissionsFormAllRoles()
			{
				$permissionsArray = [];

				$permissions = $this->roles->load('permissions')->fetch('permissions')->toArray();
				
				return array_map('strtolower', array_unique(array_flatten(array_map(function ($permission) {

					return array_fetch($permission, 'permission_slug');

				}, $permissions))));
			}

			/*
			|--------------------------------------------------------------------------
			| Relationship Methods
			|--------------------------------------------------------------------------
			*/
		   
			/**
			 * Many-To-Many Relationship Method for accessing the User->roles
			 *
			 * @return QueryBuilder Object
			 */
			public function roles()
			{
				return $this->belongsToMany('App\Role');
			}
		}
		
	- crear el modelo Role.php
		php artisan make:model Role
		
		- modificar el modelo Role
			<?php

			namespace App\Models;

			use Illuminate\Database\Eloquent\Model;

			class Role extends Model
			{
				/**
				 * The database table used by the model.
				 *
				 * @var string
				 */
				protected $table = 'roles';

				/*
				|--------------------------------------------------------------------------
				| Relationship Methods
				|--------------------------------------------------------------------------
				*/

				/**
				 * many-to-many relationship method.
				 *
				 * @return QueryBuilder
				 */
				public function users()
				{
					return $this->belongsToMany('App\User');
				}

				/**
				 * many-to-many relationship method.
				 *
				 * @return QueryBuilder
				 */
				public function permissions()
				{
					return $this->belongsToMany('App\Models\Permission');
				}
			}

		
	- crear el modelo Permission.php
		php artisan make:model Permission
		
		- modificar el modelo Permission
			<?php

			namespace App\Models;

			use Illuminate\Database\Eloquent\Model;

			class Permission extends Model
			{
				/**
				 * The database table used by the model.
				 *
				 * @var string
				 */
				protected $table = 'permissions';

				/*
				|--------------------------------------------------------------------------
				| Relationship Methods
				|--------------------------------------------------------------------------
				*/

				/**
				 * many-to-many relationship method
				 *
				 * @return QueryBuilder
				 */
				public function roles()
				{
					return $this->belongsToMany('App\Models\Role');
				}
			}

	- modificar el archivo app/Http/Kernel.php 
		protected $routeMiddleware = [
			...
			'acl' => \App\Http\Middleware\CheckPermission::class,
		];
		
	- agregar las intrucciones para el uso del middleware acl en las rutas
		por ejemplo para controlar el acceso al modulo de administracion de los usuarios:
		
			Route::group(['middleware' => 'acl:manage_user'], function () {
				Route::resource('users', 'UserController');
			});

	- para que todo lo anterior funcione se necesita hacer un reinicio de todas las migraciones, debido a que se modifico la migracion de la tabla users, la cual ya habia sido migrada
		
		php artisan migrate:refresh
		
	- para que el ejemplo anterior funcione se necesita crear el modelo de usuarios
		
		php artisan infyom:scaffold User --fromTable --tableName=users
		
- crear la funcionalidad de logs
	https://laravel.com/docs/5.1/errors
			
	- habilitar la depuracion
		- /config/app.php
			'debug' => env('APP_DEBUG', true),
		- /.env
			APP_DEBUG=true
	- cambiar el tipo de log -> daily
		- /config/app.php
			'log' => env('APP_LOG', 'daily'),
			
	- en los metodos de los controladores se pueden personalizar los mensajes de log que se va a guardar
		- se debe usar el facade
			use Log;
			
		- por ejemplo en el metodo index del controlador de usuarios se puede agregar un registro en el log
			Log::info('Mostrando la lista de usuarios');
			
		- existen diversos tipos de registros en el log
			Log::emergency($error);
			Log::alert($error);
			Log::critical($error);
			Log::error($error);
			Log::warning($error);
			Log::notice($error);
			Log::info($error);
			Log::debug($error);
			
	- agregar un administrador para los logs
		https://github.com/rap2hpoutre/laravel-log-viewer
		
		- Install via composer
			composer require rap2hpoutre/laravel-log-viewer
		
		- Add Service Provider to config/app.php in providers section
			Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider::class,
		
		- Add a route in app/Http/routes.php (or choose another route):
			Route::group(['middleware' => 'acl:admin_logs'], function () {
				Route::get('logs',['as' => 'admin.logs','uses' => 'LogViewer\LogViewerController@index']);
			});
			
		- Go to http://myapp/logs or some other route


		- se migraron los archivos del LaravelLogViewer a las carpetas del proyecto

			/views/admin/log.blade.php

			/app/Http/Controllers/admin/LogViewer/LogViewerController.php
			/app/Http/Controllers/admin/LogViewer/LaravelLogViewer.php

- se crearon las migraciones para las tablas:
	puc_clase, puc_grupo, puc_cuenta, puc_subcuenta y puc_cuentaauxiliar
	
	- para ejecutar las migraciones se ejecuta un comando por la linea de comandos
	
		php artisan migrate
	
- crear los seed para las tablas: 
	puc_clase, puc_grupo, puc_cuenta, puc_subcuenta y puc_cuentaauxiliar
	
	- se utilizo un laravel package llamado Inverse seed generator (iSeed)
		https://github.com/orangehill/iseed
		- en el archivo composer.json requerir el stat de orangehill/iseed
		
			"require": {
				...
				"orangehill/iseed": "dev-master"
			}
			
		- ejecutar por linea de comandos
		
			composer install 
			o
			composer update
			
		- en el archivo /app/config/app.php agregar un nuevo item en providers.

			Orangehill\Iseed\IseedServiceProvider::class,
			
		- una vez hecho lo anterior ya se puede usar, por linea de comando generar los seed para cada tabla
			
			php artisan iseed puc_clase
			php artisan iseed puc_grupo
			php artisan iseed puc_cuenta
			php artisan iseed puc_subcuenta
			
	- se debe actualizar el autoload con un comando
		
		composer dump-autoload
	
	- una vez hechos los seeder se ejecutan con un comando
		
		php artisan db:seed
		
		- el comando php artisan db:seed ejecuta todos los seeder creados a los que se hizo el llamado en el metodo up() del seed DatabaseSeed.php
			
- se crea la validacion para que no se permita la eliminacion de los registros que tengan dependencias
	- se uso la accion ->count() para contar el numero de elementos que dependen de del registro
		- ejemplo: $this->pucCuenta->grupos()->count()
		
- se crean las vistas para el manejo de los usuarios y la asignacion de los roles

- se crean las vistas para el manejo de los roles y permisos

- SOLUCIONADO, agregar los comandos en usuarios y roles para almacenar las acciones en el log
- SOLUCIONADO, agregar validaciones para la actualizacion de usuarios y roles para los campos unicos

- se modificaron los controladores /Auth/AuthController y /Auth/PasswordController para evitar la ecriptacion del password debido a que en el modelo User ya se esta haciendo
- se modificaron varias vistas para mejorar su funcionalidad