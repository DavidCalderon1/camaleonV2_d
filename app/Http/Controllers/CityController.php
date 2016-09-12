<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Repositories\CityRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Log;

class CityController extends InfyOmBaseController
{
    /** @var  CityRepository */
    private $cityRepository;
    private $countries;
    private $states = array(null => null);
    private $cities = array(null => null);

    public function __construct(CityRepository $cityRepo)
    {
        $this->cityRepository = $cityRepo;    
        $this->countries = $cityRepo->listCountries();        
    }

    /**
     * Display a listing of the City and get filter for country, state and city.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cityRepository->pushCriteria(new RequestCriteria($request));
        if (isset($request->country) || isset($request->state) || isset($request->city)) {
            $country = $request->country;
            $state = $request->state;
            $city = $request->city;
            $cities = $this->cityRepository->search($country, $state, $city);
        }else{
            $cities = $this->cityRepository->with('state.country')->paginate(20);
        }

        if (count($cities) == 0) {
            Log::warning('Ciudad, Index, No se encontraron ciudades: ' . $request->fullUrl() );            
            Flash::error('No se encontraron registros.');
        }else{
            Log::info('Ciudad, Index, Lista de ciudades: ' . $request->fullUrl() );            
            Flash::success('Se encontraron los siguientes registros.');
        }

        return view('cities.index')
            ->with('cities', $cities);
    }

    /**
     * Show the form for creating a new City.
     *
     * @return Response
     */
    public function create()
    {
        return view('cities.create')->with(array('states'=> $this->states, 'countries' => $this->countries));
    }

    /**
     * Store a newly created City in storage.
     *
     * @param CreateCityRequest $request
     *
     * @return Response
     */
    public function store(CreateCityRequest $request)
    {
        $input = $request->all();

        $input['nativo'] = 0;
        $input['nombre'] = strtoupper($input['nombre']);

        if($this->cityRepository->validar($input['departamento_id'], $input['nombre'], $input['codigo_ref'])){
            Log::warning('Ciudad, Para el departamento elegido existe una ciudad con el mismo nombre o código', [$input]);            
            return redirect()->back()->withErrors(['Error', 'Para el departamento elegido existe una ciudad con el mismo nombre o código.'])->withInput();
        }else{
            $city = $this->cityRepository->create($input);

            Log::info('Ciudad, Store, Se almaceno la ciudad: '.$city->id, [$input]);
            Flash::success('City saved successfully.');

            return redirect(route('cities.index'));
        }
    }

    /**
     * Display the specified City.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $city = $this->cityRepository->has('state.country')->findWithoutFail($id);

        if (empty($city)) {
            Log::error('Ciudad, Show, No se encuentra la ciudad: ' . $id);
            Flash::error('City not found');

            return redirect(route('cities.index'));
        }

        return view('cities.show')->with('city', $city);
    }

    /**
     * Show the form for editing the specified City.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $city = $this->cityRepository->has('state.country')->findWithoutFail($id);

        $city['pais_id'] = $city->state->country->id;

        if (empty($city)) {
            Log::error('Ciudad, Edit, No se encuentra la ciudad: ' . $id);
            Flash::error('City not found');

            return redirect(route('cities.index'));
        }
        else if($city->nativo){
            Log::error('Ciudad, Edit, La ciudad ' . $id . ' no se puede editar ya que es un registro nativo.');
            Flash::error('La ciudad no se puede editar ya que es un registro nativo.');

            return redirect(route('cities.show', [$city->id]));
        }

        return view('cities.edit')->with(array('city' => $city, 'countries' => $this->countries, 'states' => $this->cityRepository->listStates($city->state->country->id)));
    }

    /**
     * Update the specified City in storage.
     *
     * @param  int              $id
     * @param UpdateCityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCityRequest $request)
    {
        $city = $this->cityRepository->findWithoutFail($id);

        if (empty($city)) {
            Log::error('Ciudad, Update, No se encuentra la ciudad: ' . $id, [$request->all()]);            
            Flash::error('City not found');

            return redirect(route('cities.index'));
        }

        $input = $request->all();
        $input['nombre'] = strtoupper($input['nombre']);
        if($this->cityRepository->validar($input['departamento_id'], $input['nombre'], $input['codigo_ref'], $id)){
            Log::warning('Ciudad, Update, Para el departamento elegido existe una ciudad con el mismo nombre o código. id: ' . $id, [$input]);            
            return redirect()->back()->withErrors(['Error', 'Para el departamento elegido existe una ciudad con el mismo nombre o código.'])->withInput();
        }else{
            $city = $this->cityRepository->update($input, $id);

            Log::info('Ciudad, Update, Se edito la ciudad: ' . $id, [$input]);
            Flash::success('City updated successfully.');

            return redirect(route('cities.index'));
        }
    }

    /**
     * Remove the specified City from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $city = $this->cityRepository->findWithoutFail($id);
        $citiesWithSucursales = $this->cityRepository->relateds($id);

        if (empty($city)) {
            Log::error('Ciudad, Destroy, No se encuentra la ciudad: ' . $id);            
            Flash::error('City not found');

            return redirect(route('cities.index'));
        }else if($city->nativo){
            Log::error('Ciudad, Destroy, La ciudad ' . $id . ' no se puede eliminar ya que es un registro nativo.');            
            Flash::error('La ciudad no se puede eliminar ya que es un registro nativo.');

            return redirect(route('cities.show', [$city->id]));
        }else if($citiesWithSucursales){
            Log::error('Ciudad, Destroy, La ciudad ' . $id . ' no se puede eliminar ya que posee registros relacionados.');            
            Flash::error('La ciudad no se puede eliminar ya que posee registros relacionados.');

            return redirect(route('cities.show', [$city->id]));
        }

        $this->cityRepository->delete($id);

        Log::info('Ciudad, Destroy, Se eliminó la ciudad: ' . $id);
        Flash::success('City deleted successfully.');

        return redirect(route('cities.index'));
    }


    /**
     * Lista los departamentos segun el id del pais pasado por parametro.
     *
     * @param  int $id_pais
     *
     * @return Response
     */
    public function listStates(Request $request)
    {
        $id_pais = $request->id_pais;
        $this->states = $this->cityRepository->listStates($id_pais);
        return $this->states;
    }

    /**
     * Lista las ciudades segun el id del departamento pasado por parametro.
     *
     * @param  int $id_departamento
     *
     * @return Response
     */
    public function listCities(Request $request)
    {
        $id_departamento = $request->id_departamento;
        $this->cities = $this->cityRepository->listCities($id_departamento);
        return $this->cities;
    }
}
