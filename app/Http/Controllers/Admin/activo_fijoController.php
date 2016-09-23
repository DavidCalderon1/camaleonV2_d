<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Admin\Createactivo_fijoRequest;
use App\Http\Requests\Admin\Updateactivo_fijoRequest;
use App\Repositories\Admin\activo_fijoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class activo_fijoController extends InfyOmBaseController
{
    /** @var  activo_fijoRepository */
    private $activoFijoRepository;

    public function __construct(activo_fijoRepository $activoFijoRepo)
    {
        $this->activoFijoRepository = $activoFijoRepo;
        $this->beforeFilter('@mayusculas',['only' => ['store','update'] ]);
    }
    //metodo mayusculas ejecutado por el metodo beforeFilter dentro del constructor para colocar en mayusculas cada dato
    public function mayusculas(Route $route, Request $request){
        //va a obtener los datos recibidos eceptuando algunos, por ejemplo la descripcion la cual no se debe pasar a mayusculas
        $input = $request->except(['_method','_token','descripcion']);
        foreach ($input as $key => $value) {
            $request[$key] = strtoupper($value);
        }
    }

    /**
     * Display a listing of the activo_fijo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->activoFijoRepository->pushCriteria(new RequestCriteria($request));
        $activosFijos = $this->activoFijoRepository->all();

        return view('admin.activosFijos.index')
            ->with('activosFijos', $activosFijos);
    }

    /**
     * Show the form for creating a new activo_fijo.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.activosFijos.create');
    }

    /**
     * Store a newly created activo_fijo in storage.
     *
     * @param Createactivo_fijoRequest $request
     *
     * @return Response
     */
    public function store(Createactivo_fijoRequest $request)
    {
        $input = $request->all();

        $activoFijo = $this->activoFijoRepository->create($input);

        Flash::success('activo_fijo saved successfully.');

        return redirect(route('admin.activosFijos.index'));
    }

    /**
     * Display the specified activo_fijo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activoFijo = $this->activoFijoRepository->findWithoutFail($id);

        if (empty($activoFijo)) {
            Flash::error('activo_fijo not found');

            return redirect(route('admin.activosFijos.index'));
        }

        return view('admin.activosFijos.show')->with('activoFijo', $activoFijo);
    }

    /**
     * Show the form for editing the specified activo_fijo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activoFijo = $this->activoFijoRepository->findWithoutFail($id);

        if (empty($activoFijo)) {
            Flash::error('activo_fijo not found');

            return redirect(route('admin.activosFijos.index'));
        }

        return view('admin.activosFijos.edit')->with('activoFijo', $activoFijo);
    }

    /**
     * Update the specified activo_fijo in storage.
     *
     * @param  int              $id
     * @param Updateactivo_fijoRequest $request
     *
     * @return Response
     */
    public function update($id, Updateactivo_fijoRequest $request)
    {
        $activoFijo = $this->activoFijoRepository->findWithoutFail($id);

        if (empty($activoFijo)) {
            Flash::error('activo_fijo not found');

            return redirect(route('admin.activosFijos.index'));
        }

        $activoFijo = $this->activoFijoRepository->update($request->all(), $id);

        Flash::success('activo_fijo updated successfully.');

        return redirect(route('admin.activosFijos.index'));
    }

    /**
     * Remove the specified activo_fijo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activoFijo = $this->activoFijoRepository->findWithoutFail($id);

        if (empty($activoFijo)) {
            Flash::error('activo_fijo not found');

            return redirect(route('admin.activosFijos.index'));
        }

        $this->activoFijoRepository->delete($id);

        Flash::success('activo_fijo deleted successfully.');

        return redirect(route('admin.activosFijos.index'));
    }
}
