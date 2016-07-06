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

/*rutas del api generador*/
Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

/*rutas de la aplicacion camaleon*/

// direcciona al metodo 'index' del controlador PrincipalController
Route::get('/','PrincipalController@index');

// visor de logs Rap2hpoutre\LaravelLogViewer
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::group(['prefix' => '/admin', 'namespace' => 'Admin'], function() {
	//devuelve una pagina por defecto si no se ingresa una url correcta
	Route::get('/', function () {
		return view('layouts.default', ['site' => 'Administración']);
	});
	//devuelve una pagina por defecto si no se ingresa una url correcta
	Route::group([
		'prefix' => 'puc',
		'namespace' => 'Puc'
		//'as' => 'puc',
	], function() {
		//devuelve una pagina por defecto si no se ingresa una url correcta
		Route::get('/', function () {
			return view('layouts.default', ['site' => 'Plan Único de Cuentas']);
		});
		// /admin/puc/
		//admin.puc.buscar 
		Route::resource('operacion', 'puc_operacionesController');
		Route::get('buscar', 'puc_operacionesController@index');
		Route::get('crear', 'puc_operacionesController@create');
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

Route::get('/home', 'HomeController@index');

/*rutas con la implementacion del control de roles, acl (Access Control List)*/

Route::group(['middleware' => 'acl:manage_user'], function () {
	Route::resource('users', 'UserController');
});

/*
Route::get('/users', [
	'middleware' => 'acl:manage_user',
	'as' => 'users.all',
	'uses' => 'UserController@index'
]);