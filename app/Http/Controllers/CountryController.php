<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Repositories\CountryRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Log;

class CountryController extends InfyOmBaseController
{
    /** @var  CountryRepository */
    private $countryRepository;

    public function __construct(CountryRepository $countryRepo)
    {
        $this->countryRepository = $countryRepo;
    }

    /**
     * Display a listing of the Country and get filter for country.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->countryRepository->pushCriteria(new RequestCriteria($request));
        if (isset($request->country)) {
            $country = $request->country;
            $countries = $this->countryRepository->search($country);
        }else{
            $countries = $this->countryRepository->paginate(20);
        }

        if (count($countries) == 0) {
            Log::warning('Pais, Index, No se encontraron paises: ' . $request->fullUrl() );
            Flash::error('No se encontraron registros.');
        }else{
            Log::info('Pais, Index, Lista de paises: ' . $request->fullUrl() );
            Flash::success('Se encontraron los siguientes registros.');
        }

        return view('countries.index')
            ->with('countries', $countries);
    }

    /**
     * Show the form for creating a new Country.
     *
     * @return Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created Country in storage.
     *
     * @param CreateCountryRequest $request
     *
     * @return Response
     */
    public function store(CreateCountryRequest $request)
    {
        $input = $request->all();

        $input['nativo'] = 0;
        $input['nombre'] = strtoupper($input['nombre']);
        if($this->countryRepository->validar($input['nombre'], $input['codigo_ref'])){
            Log::warning('Pais, Store, Hay un pais con el mismo nombre o código: ', [$input]);
            return redirect()->back()->withErrors(['Error', 'Hay un pais con el mismo nombre o código.'])->withInput();
        }else{
            $country = $this->countryRepository->create($input);

            Log::info('Pais, Store, Se almaceno el pais: '.$country->id, [$input]);
            Flash::success('Country saved successfully.');

            return redirect(route('countries.show', [$country->id]));
        }
    }

    /**
     * Display the specified Country.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $country = $this->countryRepository->findWithoutFail($id);

        if (empty($country)) {
            Log::error('Pais, Show, No se encuentra el pais: ' . $id);
            Flash::error('Country not found');

            return redirect(route('countries.index'));
        }

        return view('countries.show')->with('country', $country);
    }

    /**
     * Show the form for editing the specified Country.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $country = $this->countryRepository->findWithoutFail($id);

        if (empty($country)) {
            Log::error('Pais, Edit, No se encuentra el pais: ' . $id);
            Flash::error('Country not found');

            return redirect(route('countries.index'));
        }else if($country->nativo){
            Log::error('Pais, Edit, El pais' . $id . ' no se puede editar ya que es un registro nativo.');
            Flash::error('El pais no se puede editar ya que es un registro nativo.');

            return redirect(route('countries.show', [$country->id]));
        }

        return view('countries.edit')->with('country', $country);
    }

    /**
     * Update the specified Country in storage.
     *
     * @param  int              $id
     * @param UpdateCountryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountryRequest $request)
    {
        $country = $this->countryRepository->findWithoutFail($id);

        if (empty($country)) {
            Log::error('Pais, Update, No se encuentra el pais: ' . $id, [$request->all()]);
            Flash::error('Country not found');

            return redirect(route('countries.index'));
        }
        $input = $request->all();
        $input['nombre'] = strtoupper($input['nombre']);
        if($this->countryRepository->validar($input['nombre'], $input['codigo_ref'], $id)){
            Log::warning('Pais, Update, Hay un pais con el mismo nombre o código. id: ' . $id, [$input]);
            return redirect()->back()->withErrors(['Error', 'Hay un pais con el mismo nombre o código.'])->withInput();
        }else{
            $country = $this->countryRepository->update($input, $id);
            Log::info('Pais, Update, Se edito el pais: ' . $id, [$input]);
            Flash::success('Country updated successfully.');

            return redirect(route('countries.show', [$country->id]));
        }
    }

    /**
     * Remove the specified Country from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $country = $this->countryRepository->findWithoutFail($id);
        $countryWithStates = $this->countryRepository->related_states($id);

        if (empty($country)) {
            Log::error('Pais, Destroy, No se encuentra el pais: ' . $id);            
            Flash::error('Country not found');

            return redirect(route('countries.index'));
        }else if($country->nativo){
            Log::error('Pais, Destroy, El pais ' . $id . ' no se puede eliminar ya que es un registro nativo.');            
            Flash::error('El pais no se puede eliminar ya que es un registro nativo.');

            return redirect(route('countries.show', [$country->id]));
        }else if($countryWithStates){
            Log::error('Pais, Destroy, El pais ' . $id . ' no se puede eliminar ya que posee departamentos relacionados.');            
            Flash::error('El pais no se puede eliminar ya que posee departamentos relacionados.');

            return redirect(route('countries.show', [$country->id]));
        }

        $this->countryRepository->delete($id);

        Log::info('Pais, Destroy, Se eliminó el pais: ' . $id);
        Flash::success('Country deleted successfully.');

        return redirect(route('countries.index'));
    }
}
