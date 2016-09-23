<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Repositories\StateRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Log;

class StateController extends InfyOmBaseController
{
    /** @var  StateRepository */
    private $stateRepository;
    private $countries;

    public function __construct(StateRepository $stateRepo)
    {
        $this->stateRepository = $stateRepo;
        $this->countries = $stateRepo->listCountries();
    }

    /**
     * Display a listing of the State and get filter for country and state.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stateRepository->pushCriteria(new RequestCriteria($request));
        if (isset($request->country) || isset($request->state)) {
            $country = $request->country;
            $state = $request->state;
            $states = $this->stateRepository->search($country, $state);
        }else{
            $states = $this->stateRepository->has('country')->paginate(20);
        }

        if (count($states) == 0) {
            Log::warning('Departamento, Index, No se encontraron departamentos: ' . $request->fullUrl() );
            Flash::error('No se encontraron registros.');
        }else{
            Log::info('Departamento, Index, Lista de departamentos: ' . $request->fullUrl() );
            Flash::success('Se encontraron los siguientes registros.');
        }

        return view('states.index')
            ->with('states', $states);
    }

    /**
     * Show the form for creating a new State.
     *
     * @return Response
     */
    public function create()
    {
        return view('states.create')->with('countries', $this->countries);
    }

    /**
     * Store a newly created State in storage.
     *
     * @param CreateStateRequest $request
     *
     * @return Response
     */
    public function store(CreateStateRequest $request)
    {
        $input = $request->all();

        $input['nativo'] = 0;
        $input['nombre'] = strtoupper($input['nombre']);
        if($this->stateRepository->validar($input['pais_id'], $input['nombre'], $input['codigo_ref'])){
            Log::warning('Departamento, Para el pais elegido existe un departamento con el mismo nombre o código', [$input]);
            return redirect()->back()->withErrors(['Error', 'Para el pais elegido existe un departamento con el mismo nombre o código.'])->withInput();
        }else{
            $state = $this->stateRepository->create($input);

            Log::info('Departamento, Store, Se almaceno el departamento: '.$state->id, [$input]);
            Flash::success('State saved successfully.');

            return redirect(route('states.show', [$state->id]));
        }
    }

    /**
     * Display the specified State.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $state = $this->stateRepository->has('country')->findWithoutFail($id);

        if (empty($state)) {
            Log::error('Departamento, Show, No se encuentra el departamento: ' . $id);
            Flash::error('State not found');

            return redirect(route('states.index'));
        }

        return view('states.show')->with('state', $state);
    }

    /**
     * Show the form for editing the specified State.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $state = $this->stateRepository->has('country')->findWithoutFail($id);

        if (empty($state)) {
            Log::error('Departamento, Edit, No se encuentra el departamento: ' . $id);
            Flash::error('State not found');

            return redirect(route('states.index'));
        }else if($state->nativo){
            Log::error('Departamento, Edit, El departamento' . $id . ' no se puede editar ya que es un registro nativo.');
            Flash::error('El departamento no se puede editar ya que es un registro nativo.');

            return redirect(route('states.show', [$state->id]));
        }

        return view('states.edit')->with(array('state' => $state, 'countries' => $this->countries));
    }

    /**
     * Update the specified State in storage.
     *
     * @param  int              $id
     * @param UpdateStateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStateRequest $request)
    {
        $state = $this->stateRepository->findWithoutFail($id);

        if (empty($state)) {
            Log::error('Departamento, Update, No se encuentra el departamento: ' . $id, [$request->all()]);
            Flash::error('State not found');

            return redirect(route('states.index'));
        }

        $input = $request->all();
        $input['nombre'] = strtoupper($input['nombre']);
        if($this->stateRepository->validar($input['pais_id'], $input['nombre'], $input['codigo_ref'], $id)){
            Log::warning('Departamento, Update, Para el pais elegido existe un departamento con el mismo nombre o código. id: ' . $id, [$input]);
            return redirect()->back()->withErrors(['Error', 'Para el pais elegido existe un departamento con el mismo nombre o código.'])->withInput();
        }else{
            $state = $this->stateRepository->update($input, $id);

            Log::info('Departamento, Update, Se edito el departamento: ' . $id, [$input]);
            Flash::success('State updated successfully.');

            return redirect(route('states.show', [$state->id]));
        }
    }

    /**
     * Remove the specified State from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $state = $this->stateRepository->findWithoutFail($id);
        $stateWithCities = $this->stateRepository->related_cities($id);

        if (empty($state)) {
            Log::error('Departamento, Destroy, No se encuentra el departamento: ' . $id);
            Flash::error('State not found');

            return redirect(route('states.index'));
        }else if($state->nativo){
            Log::error('Departamento, Destroy, El departamento ' . $id . ' no se puede eliminar ya que es un registro nativo.');
            Flash::error('El departamento no se puede eliminar ya que es un registro nativo.');

            return redirect(route('states.show', [$state->id]));
        }else if($stateWithCities){
            Log::error('Departamento, Destroy, El departamento ' . $id . ' no se puede eliminar ya que posee ciudades relacionados.');
            Flash::error('El departamento no se puede eliminar ya que posee ciudades relacionadas.');

            return redirect(route('states.show', [$state->id]));
        }

        $this->stateRepository->delete($id);

        Log::info('Departamento, Destroy, Se eliminó el departamento: ' . $id);
        Flash::success('State deleted successfully.');

        return redirect(route('states.index'));
    }
}
