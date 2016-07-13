<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

/*rutas de la aplicacion camaleon*/

// direcciona al metodo 'index' del controlador PrincipalController
Route::get('/',['as' => 'inicio','uses' => 'HomeController@index']);


Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
	//devuelve una pagina por defecto si no se ingresa una url correcta
	Route::get('/', function () {
		return view('layouts.default', ['site' => 'Administración']);
	});
	///admin/usuarios/ 
	//administracion de los usuarios
	Route::group(['middleware' => 'acl:admin_usuarios'], function () {
		Route::resource('usuarios', 'UserController');
	});
	// /admin/roles/
	// /admin/roles/permisos
	//administracion de los roles y permisos
	Route::group(['middleware' => 'acl:admin_roles'], function () {
		Route::resource('roles', 'RoleController');
		Route::resource('permisos', 'PermissionController');
	});
	// visor de logs /admin/logs/
	Route::group(['middleware' => 'acl:admin_logs'], function () {
		Route::get('logs',['as' => 'admin.logs','uses' => 'LogViewer\LogViewerController@index']);
	});
	//devuelve una pagina por defecto si no se ingresa una url correcta
	Route::group([
		'prefix' => 'puc',
		'namespace' => 'Puc'
	], function() {
		//devuelve una pagina por defecto si no se ingresa una url correcta
		Route::get('/', function () {
			return view('layouts.default', ['site' => 'Plan Único de Cuentas']);
		});
		// /admin/puc/
		// requiere que el usuario tenga el permiso de administrar el puc
		Route::group(['middleware' => 'acl:admin_puc'], function () {
			//admin.puc.buscar 
			Route::resource('operacion', 'puc_operacionesController');
			Route::get('buscar', ['as' => 'admin.puc.buscar','uses' => 'puc_operacionesController@index']);
			Route::get('crear', ['as' => 'admin.puc.crear','uses' => 'puc_operacionesController@create']);
			Route::get('listas', 'puc_operacionesController@lista');
			//admin.puc.clases 
			Route::resource('clases', 'puc_claseController');
			//admin.puc.grupos 
			Route::resource('grupos', 'puc_grupoController');
			//admin.puc.cuentas 
			Route::resource('cuentas', 'puc_cuentaController');
			//admin.puc.subcuentas 
			Route::resource('subcuentas', 'puc_subcuentaController');
			//admin.puc.cuentasauxiliares 
			Route::resource('cuentasauxiliares', 'puc_cuentaauxiliarController');
		});
	});
});

/*rutas de la autenticacion*/

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

//Route::get('/home', 'HomeController@index');

