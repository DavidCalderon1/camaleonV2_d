<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSucursalRequest;
use App\Http\Requests\UpdateSucursalRequest;
use App\Repositories\SucursalRepository;
use App\Repositories\CityRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Log;

class SucursalController extends InfyOmBaseController
{
    /** @var  SucursalRepository */
    private $sucursalRepository;
    private $cityRepository;
    private $countries;
    private $states = array(null => null);
    private $cities = array(null => null);    

    public function __construct(SucursalRepository $sucursalRepo, CityRepository $cityRepo)
    {
        $this->sucursalRepository = $sucursalRepo;
        $this->cityRepository = $cityRepo; 
        $this->countries = $this->cityRepository->listCountries();
    }

    /**
     * Display a listing of the Sucursal.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sucursalRepository->pushCriteria(new RequestCriteria($request));
        if (isset($request->nombre)) {
            $nombre = $request->nombre;
            $sucursales = $this->sucursalRepository->search($nombre);
        }else{
            $sucursales = $this->sucursalRepository->with('city.state.country')->paginate(20);
        }

        if (count($sucursales) == 0) {
            Log::warning('Sucursal, Index, No se encontraron sucursales: ' . $request->fullUrl() );
            Flash::error('No se encontraron registros.');
        }else{
            Log::info('Sucursal, Index, Lista de sucursales: ' . $request->fullUrl() );
            Flash::success('Se encontraron los siguientes registros.');
        }
        return view('sucursales.index')
            ->with('sucursales', $sucursales);
    }

    /**
     * Show the form for creating a new Sucursal.
     *
     * @return Response
     */
    public function create()
    {
        return view('sucursales.create')->with(array('countries' => $this->countries, 'states'=> $this->states, 'cities' => $this->cities));
    }

    /**
     * Store a newly created Sucursal in storage.
     *
     * @param CreateSucursalRequest $request
     *
     * @return Response
     */
    public function store(CreateSucursalRequest $request)
    {
        $input = $request->all();
        $input['nombre'] = strtoupper($input['nombre']);
        $input['direccion'] = strtoupper($input['direccion']);

        if($this->sucursalRepository->validar($input['ciudad_id'], $input['nombre'])){
            Log::warning('Sucursal, Para la ciudad elegida existe una sucursal con el mismo nombre.', [$input]);            
            return redirect()->back()->withErrors(['Error', 'Para la ciudad elegida existe una sucursal con el mismo nombre.'])->withInput();
        }else{
            $sucursal = $this->sucursalRepository->create($input);

            Log::info('Sucursal, Store, Se almaceno la sucursal: '.$sucursal->id, [$input]);
            Flash::success('Sucursal saved successfully.');

            return redirect(route('sucursales.index'));
        }
    }

    /**
     * Display the specified Sucursal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sucursal = $this->sucursalRepository->findWithoutFail($id);

        if (empty($sucursal)) {
            Log::error('Sucursal, Show, No se encuentra la sucursal: ' . $id);            
            Flash::error('Sucursal not found');

            return redirect(route('sucursales.index'));
        }

        return view('sucursales.show')->with('sucursal', $sucursal);
    }

    /**
     * Show the form for editing the specified Sucursal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sucursal = $this->sucursalRepository->with('city.state.country')->findWithoutFail($id);
        $sucursal['pais_id'] = $sucursal->city->state->country->id;
        $sucursal['departamento_id'] = $sucursal->city->state->id;
        $sucursal['ciudad_id'] = $sucursal->city->id;

        if (empty($sucursal)) {
            Log::error('sucursal, Edit, No se encuentra la sucursal: ' . $id);
            Flash::error('Sucursal not found');

            return redirect(route('sucursales.index'));
        }

        return view('sucursales.edit')->with(array('sucursal' => $sucursal, 'countries' => $this->countries, 'states'=> $this->cityRepository->listStates($sucursal->city->state->country->id), 'cities' => $this->cityRepository->listCities($sucursal->city->state->id)));
    }

    /**
     * Update the specified Sucursal in storage.
     *
     * @param  int              $id
     * @param UpdateSucursalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSucursalRequest $request)
    {
        $sucursal = $this->sucursalRepository->findWithoutFail($id);

        if (empty($sucursal)) {
            Log::error('Sucursal, Update, No se encuentra la sucursal: ' . $id, [$request->all()]);            
            Flash::error('Sucursal not found');

            return redirect(route('sucursales.index'));
        }

        $input = $request->all();

        $input['nombre'] = strtoupper($input['nombre']);
        $input['direccion'] = strtoupper($input['direccion']);

        if($this->sucursalRepository->validar($input['ciudad_id'], $input['nombre'], $id)){
            Log::warning('Sucursal, Update, Para la ciudad elegida existe una sucursal con el mismo nombre. id: ' . $id, [$input]);            
            return redirect()->back()->withErrors(['Error', 'Para la ciudad elegida existe una sucursal con el mismo nombre.'])->withInput();
        }else{
            $sucursal = $this->sucursalRepository->update($input, $id);

            Log::info('Sucursal, Update, Se edito la sucursal: ' . $id, [$input]);
            Flash::success('Sucursal updated successfully.');

            return redirect(route('sucursales.index'));
        }
    }

    /**
     * Remove the specified Sucursal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sucursal = $this->sucursalRepository->findWithoutFail($id);

        if (empty($sucursal)) {
            Log::error('Sucursal, Destroy, No se encuentra la sucursal: ' . $id);            
            Flash::error('Sucursal not found');

            return redirect(route('sucursales.index'));
        }

        $this->sucursalRepository->delete($id);

        Log::info('Sucursal, Destroy, Se eliminó la sucursal: ' . $id);
        Flash::success('Sucursal deleted successfully.');

        return redirect(route('sucursales.index'));
    }
}
