<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Requests;
use App\Http\Requests\CreateTerceroRequest;
use App\Http\Requests\CreatePersonaRequest;
use App\Http\Requests\CreateEmpresaRequest;
use App\Http\Requests\UpdateTerceroRequest;
use App\Http\Requests\UpdatePersonaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Repositories\CityRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Tercero;
use App\Models\Persona;
use App\Models\Empresa;
use Response;
use Log;


class TerceroController extends InfyOmBaseController
{
    /** @var  TerceroRepository */
    private $tercero;
    private $persona;
    private $empresa;
    private $localization;
    private $countries;
    private $states = array(null => null);
    private $cities = array(null => null);  

    public function __construct(Tercero $terceroModel, Persona $personaModel, Empresa $empresaModel, CityRepository $cityRepo)
    {
        $this->tercero = $terceroModel;
        $this->persona = $personaModel;
        $this->empresa = $empresaModel;
        $this->localization = $cityRepo;
        $this->countries = $this->localization->listCountries();
    }

    /**
     * Display a listing of the Tercero.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if (isset($request->tipo) || isset($request->documento_nit)) {
            $tipo = $request->tipo;
            $documento_nit = $request->documento_nit;
            if ($tipo == "TODOS") {
                $_SESSION['documento_nit'] = $documento_nit;
                $terceros = $this->tercero::leftJoin('tercero_persona', 'tercero.id', '=', 'tercero_persona.tercero_id')->leftJoin('persona','tercero_persona.persona_id', '=', 'persona.id')->leftJoin('tercero_empresa', 'tercero.id', '=', 'tercero_empresa.tercero_id')->leftJoin('empresa','tercero_empresa.empresa_id', '=', 'empresa.id')->whereNull('tercero.deleted_at')->whereNull('persona.deleted_at')->whereNull('empresa.deleted_at')->where(function($q){ $q->where('persona.documento', 'LIKE', $_SESSION['documento_nit'] . '%')->orWhere('empresa.nit', 'LIKE', $_SESSION['documento_nit'] . '%'); })->select('tercero.id', 'tercero.tipo', 'persona.nombre', 'persona.apellido', 'persona.documento', 'empresa.razon_social', 'empresa.nit')->paginate(20);
            }else {
                $_SESSION['documento_nit'] = $documento_nit;
                $terceros = $this->tercero::leftJoin('tercero_persona', 'tercero.id', '=', 'tercero_persona.tercero_id')->leftJoin('persona','tercero_persona.persona_id', '=', 'persona.id')->leftJoin('tercero_empresa', 'tercero.id', '=', 'tercero_empresa.tercero_id')->leftJoin('empresa','tercero_empresa.empresa_id', '=', 'empresa.id')->whereNull('tercero.deleted_at')->whereNull('persona.deleted_at')->whereNull('empresa.deleted_at')->where('tercero.tipo', '=', $tipo)->where(function ($q){ $q->where('persona.documento', 'LIKE', $_SESSION['documento_nit'] . '%')->orWhere('empresa.nit', 'LIKE', $_SESSION['documento_nit'] . '%');})->select('tercero.id', 'tercero.tipo', 'persona.nombre', 'persona.apellido', 'persona.documento', 'empresa.razon_social', 'empresa.nit')->paginate(20);
            }
        }else{
            $terceros = $this->tercero::leftJoin('tercero_persona', 'tercero.id', '=', 'tercero_persona.tercero_id')->leftJoin('persona','tercero_persona.persona_id', '=', 'persona.id')->leftJoin('tercero_empresa', 'tercero.id', '=', 'tercero_empresa.tercero_id')->leftJoin('empresa','tercero_empresa.empresa_id', '=', 'empresa.id')->whereNull('tercero.deleted_at')->whereNull('persona.deleted_at')->whereNull('empresa.deleted_at')->select('tercero.id', 'tercero.tipo', 'persona.nombre', 'persona.apellido', 'persona.documento', 'empresa.razon_social', 'empresa.nit')->paginate(20);
        }

        if (count($terceros) == 0) {
            Log::warning('Terceros, Index, No se encontraron terceros: ' . $request->fullUrl() );
            Flash::error('No se encontraron registros.');
        }else{
            Log::info('Terceros, Index, Lista de terceros: ' . $request->fullUrl() );
            Flash::success('Se encontraron los siguientes registros.');
        }

        return view('terceros.index')->with('terceros', $terceros);
    }

    /**
     * Show the form for creating a new Tercero.
     *
     * @return Response
     */
    public function create()
    {
        $tipo;
        if (\Session('tipo') != null) {
            $tipo = \Session('tipo');
        }else{
            $tipo = 'NATURAL';
        }
        $sendtoview = array('tipo' => $tipo,'countries' => $this->countries, 'states' => $this->states, 'cities' => $this->cities);
        return view('terceros.create', ['disable' => false])->with($sendtoview);
    }

    /**
     * Store a newly created Tercero in storage.
     *
     * @param CreateTerceroRequest $request
     *
     * @return Response
     */
    public function store(CreateTerceroRequest $request)
    {
        $input = $request->all();

        if($input['tipo'] == 'NATURAL'){
            $register = $this->storePersona(new CreatePersonaRequest, $input);
            if($register){
                Log::warning('Tercero, Store, Errores en campos para persona', [$input]);
                return back()->withErrors($register)->with('tipo', $input['tipo'])->withInput();
            }
            
        }else{
            $register = $this->storeEmpresa(new CreateEmpresaRequest, $input);
            if($register){
                Log::warning('Tercero, Store, Errores en campos para empresa', [$input]);
                return back()->withErrors($register)->with('tipo', $input['tipo'])->withInput();
            }
        }

        Flash::success('Tercero saved successfully.');

        return redirect(route('terceros.index'));
    }

    /**
     * Creacion de tercero Presona
     *
     * @param CreatePersonaRequest $request
     * @param array $attributes
     *
     * @return Response
     */
    public function storePersona(CreatePersonaRequest $request, $attributes)
    {
        $validator = Validator::make($attributes, $request->rules());
        if ($validator->fails()) {
            return $validator->errors();
        }
        $tercero = $this->tercero->create($attributes);
        $attributes['nombre'] = strtoupper($attributes['nombre']);
        $attributes['apellido'] = strtoupper($attributes['apellido']);
        $attributes['direccion'] = strtoupper($attributes['direccion']);
        $persona = $this->persona->create($attributes);
        $tercero->personas()->attach($persona->id);
        Log::info('Terceros, storePersona, Se almaceno El tercero: ' . $tercero->id . ', con  la persona: ' . $persona->id, [$attributes]);
        return false;
    }

    /**
     * Creacion de tercero Empresa
     *
     * @param CreateEmpresaRequest $request
     * @param array $attributes
     *
     * @return Response
     */
    public function storeEmpresa(CreateEmpresaRequest $request, $attributes)
    {
        $validator = Validator::make($attributes, $request->rules());
        if ($validator->fails()) {
            return $validator->errors();
        }
        $tercero = $this->tercero->create($attributes);
        $attributes['nit'] = strtoupper($attributes['nit']);
        $attributes['razon_social'] = strtoupper($attributes['razon_social']);
        $attributes['direccion'] = strtoupper($attributes['direccion']);
        $empresa = $this->empresa->create($attributes);
        $tercero->empresas()->attach($empresa->id);
        Log::info('Tercero, storeEmpresa, Se almaceno El tercero: ' . $tercero->id . ', con  la empresa: ' . $empresa->id, [$attributes]);
        return false;
    }

    /**
     * Display the specified Tercero.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tercero = $this->tercero->find($id);
        $tipo = $tercero->tipo;
        $sendtoview;
        if (count($tercero->personas) > 0) {
            $persona = $this->persona::with('city.state.country')->find($tercero->personas[0]->id);
            $sendtoview = array('tercero' => $tercero, 'persona' => $persona, 'tipo' => $tipo);
        }elseif (count($tercero->empresas) > 0) {
            $empresa = $this->empresa::with('city.state.country')->find($tercero->empresas[0]->id);
            $sendtoview = array('tercero' => $tercero, 'empresa' => $empresa, 'tipo' => $tipo);
        }

        if (empty($tercero)) {
            Log::error('Terceros, Show, No se encuentra el tercero: ' . $id);
            Flash::error('Tercero not found');

            return redirect(route('terceros.index'));
        }

        return view('terceros.show')->with($sendtoview);
    }

    /**
     * Show the form for editing the specified Tercero.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tercero = $this->tercero::find($id);
        $relation;
        if(count($tercero->personas)  > 0){
            $relation = $this->persona::with('city.state.country')->find($tercero->personas[0]->id);
            $tercero['nombre'] = $tercero->personas[0]->nombre;
            $tercero['apellido'] = $tercero->personas[0]->apellido;
            $tercero['tipo_documento'] = $tercero->personas[0]->tipo_documento;
            $tercero['documento'] = $tercero->personas[0]->documento;
            $tercero['direccion'] = $tercero->personas[0]->direccion;
            $tercero['telefono'] = $tercero->personas[0]->telefono;
        }elseif(count($tercero->empresas)  > 0){
            $relation = $this->empresa::with('city.state.country')->find($tercero->empresas[0]->id);
            $tercero['razon_social'] = $tercero->empresas[0]->razon_social;
            $tercero['nit'] = $tercero->empresas[0]->nit;
            $tercero['naturaleza'] = $tercero->empresas[0]->naturaleza;
            $tercero['fecha_constitucion'] = date("Y-m-d", strtotime($tercero->empresas[0]->fecha_constitucion));
            $tercero['direccion'] = $tercero->empresas[0]->direccion;
            $tercero['telefono'] = $tercero->empresas[0]->telefono;
        }

        
        if (empty($tercero)) {
            Log::error('Terceros, Edit, No se encuentra el tercero: ' . $id);
            Flash::error('Tercero not found');

            return redirect(route('terceros.index'));
        }
        $tercero['pais_id'] = $relation->city->state->country->id;
        $tercero['departamento_id'] = $relation->city->state->id;
        $tercero['ciudad_id'] = $relation->city->id;

        return view('terceros.edit', ['disable' => true])->with(['tercero' => $tercero, 'tipo' => $tercero->tipo, 'countries' => $this->countries, 'states' => $this->localization->listStates($relation->city->state->country->id), 'cities' => $this->localization->listCities($relation->city->state->id)]);
    }

    /**
     * Update the specified Tercero in storage.
     *
     * @param  int              $id
     * @param UpdateTerceroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTerceroRequest $request)
    {
        $input = $request->all();

        if($input['tipo'] == 'NATURAL'){
            $update = $this->updatePersona($id, new UpdatePersonaRequest, $input);
            if($update){
                Log::warning('Tercero, Update, Errores en campos para persona', [$input]);                
                return back()->withErrors($update)->with('tipo', $input['tipo'])->withInput();
            }
            
        }else{
            $update = $this->updateEmpresa($id, new UpdateEmpresaRequest, $input);
            if($update){
                Log::warning('Tercero, Update, Errores en campos para empresa', [$input]);                
                return back()->withErrors($update)->with('tipo', $input['tipo'])->withInput();
            }
        }

        Flash::success('Tercero updated successfully.');

        return redirect(route('terceros.index'));
    }

    /**
     * Update de tercero Persona
     *
     * @param Integer $tercero_id
     * @param UpdatePersonaRequest $request
     * @param array $attributes
     *
     * @return Response
     */
    public function updatePersona($tercero_id, UpdatePersonaRequest $request, $attributes)
    {
        $tercero = $this->tercero::find($tercero_id);
        $persona = $this->persona::find($tercero->personas[0]->id);
        if (empty($tercero)) {
            Flash::error('Tercero not found');

            return redirect(route('terceros.index'));
        }

        $validator = Validator::make($attributes, $request->rules($persona->id));
        if ($validator->fails()) {
            return $validator->errors();
        }
        $tercero->fill($attributes);
        $tercero->save();
        $attributes['nombre'] = strtoupper($attributes['nombre']);
        $attributes['apellido'] = strtoupper($attributes['apellido']);
        $attributes['direccion'] = strtoupper($attributes['direccion']);
        $persona->fill($attributes);
        $persona->save();
        Log::info('Terceros, updatePersona, Se editó el tercero: ' . $tercero_id . ', con  la persona: ' . $persona->id, [$attributes]);
        return false;
    }

    /**
     * Update de tercero Empresa
     *
     * @param Integer $tercero_id
     * @param UpdateEmpresaRequest $request
     * @param array $attributes
     *
     * @return Response
     */
    public function updateEmpresa($tercero_id, UpdateEmpresaRequest $request, $attributes)
    {
        $tercero = $this->tercero::find($tercero_id);
        $empresa = $this->empresa::find($tercero->empresas[0]->id);
        if (empty($tercero)) {
            Flash::error('Tercero not found');

            return redirect(route('terceros.index'));
        }

        $validator = Validator::make($attributes, $request->rules($empresa->id));
        if ($validator->fails()) {
            return $validator->errors();
        }
        $tercero->fill($attributes);
        $tercero->save();
        $attributes['nit'] = strtoupper($attributes['nit']);
        $attributes['razon_social'] = strtoupper($attributes['razon_social']);
        $attributes['direccion'] = strtoupper($attributes['direccion']);
        $empresa->fill($attributes);
        $empresa->save();
        Log::info('Tercero, updateEmpresa, Se editó el tercero: ' . $tercero_id . ', con  la empresa: ' . $empresa->id, [$attributes]);
        return false;
    }

    /**
     * Remove the specified Tercero from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tercero = $this->tercero::find($id);
        $relation;
        $id_related;
        if(count($tercero->personas)  > 0){
            $relation = $this->persona::find($tercero->personas[0]->id);
            $id_related = $tercero->personas[0]->id;
        }elseif (count($tercero->empresas)  > 0) {
            $relation = $this->empresa::find($tercero->empresas[0]->id);
            $id_related = $tercero->empresas[0]->id;
        }

        if (empty($tercero) || empty($relation)) {
            Log::error('Terceros, Destroy, No se encuentra el tercero: ' . $id);
            Flash::error('Tercero not found');
            return redirect(route('terceros.index'));
        }

        $tercero->delete($id);
        $relation->delete($id_related);

        Log::info('Terceros, Destroy, Se eliminó el tercero: ' . $id);
        Flash::success('Tercero deleted successfully.');

        return redirect(route('terceros.index'));
    }
}
