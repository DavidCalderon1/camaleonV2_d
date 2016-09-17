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
		'prefix' => 'pc',
		'namespace' => 'Pc'
	], function() {
		//devuelve una pagina por defecto si no se ingresa una url correcta
		Route::get('/', function () {
			//return view('layouts.default', ['site' => 'Plan de Cuentas']);
			return redirect()->route('admin.pc.buscar');
		});
		// /admin/pc/
		// requiere que el usuario tenga el permiso de administrar el pc
		Route::group(['middleware' => 'acl:admin_pc'], function () {
			//modulo PDC
			//admin.pc.buscar 
			Route::resource('operacion', 'pc_operacionesController');
			Route::get('buscar', ['as' => 'admin.pc.buscar','uses' => 'pc_operacionesController@index']);
			Route::get('crear', ['as' => 'admin.pc.crear','uses' => 'pc_operacionesController@create']);
			Route::get('listas', 'pc_operacionesController@lista');
			//admin.pc.clases 
			Route::resource('clases', 'pc_claseController');
			//admin.pc.grupos 
			Route::resource('grupos', 'pc_grupoController');
			//admin.pc.cuentas 
			Route::resource('cuentas', 'pc_cuentaController');
			//admin.pc.subcuentas 
			Route::resource('subcuentas', 'pc_subcuentaController');
			//admin.pc.cuentasauxiliares 
			Route::resource('cuentasauxiliares', 'pc_cuentaauxiliarController');
		});

	});

	//modulo Transacciones
	Route::resource('transacciones', 'transaccionController');

	Route::get('transaccion/buscar', ['as' => 'admin.transaccion.buscar','uses' => 'transaccionController@buscar']);
	Route::get('transaccion/crear', ['as' => 'admin.transaccion.crear','uses' => 'transaccionController@crear']);
	Route::get('transaccion', function () {
			return view('layouts.default', ['site' => 'Transacciones']);
		});

	//modulo movimientos Contables
	Route::resource('movimientosContables', 'movimiento_contableController');
	
	Route::get('movimientoContable/lista', ['as' => 'admin.movimientosContables.lista','uses' => 'movimiento_contableController@lista']);

	//modulo activosFijos
	Route::resource('activosFijos', 'activo_fijoController');

	Route::get('activoFijo/buscar', ['as' => 'admin.activoFijo.buscar','uses' => 'activo_fijoController@buscar']);
	Route::get('activoFijo/crear', ['as' => 'admin.activoFijo.crear','uses' => 'activo_fijoController@crear']);
	Route::get('activoFijo', function () {
			return view('layouts.default', ['site' => 'Activos Fijos']);
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
Route::group(['middleware' => 'auth'], function () {
	/*Localizacion*/
	Route::resource('countries', 'CountryController');
	Route::resource('states', 'StateController');

	Route::resource('cities', 'CityController');
	Route::post('cities/listStates', 'CityController@listStates');
	Route::post('cities/listCities', 'CityController@listCities');

	/*sucursal*/
	Route::resource('sucursales', 'SucursalController');

	/*Terceros*/
	Route::resource('terceros', 'TerceroController');

	Route::post("terceros/tercero_tipo", function(Illuminate\Http\Request $request){
		$countries = App\Models\Country::lists('nombre','id');
		$states = array(null => null);
		$cities = array(null => null);
	    $sendtoview = array('countries' => $countries, 'states' => $states, 'cities' => $cities);
		if ($request->tipo=='NATURAL') {
			return View::make("personas.fields")->with($sendtoview)->render();
		}else{
			return View::make("empresas.fields")->with($sendtoview)->render();
		}
	});
});
