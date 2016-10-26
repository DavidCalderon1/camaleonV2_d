<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMateria_PrimaRequest;
use App\Http\Requests\UpdateMateria_PrimaRequest;
use App\Models\Materia_Prima;
use App\Models\Tercero;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use Validator;
use Log;

class Materia_PrimaController extends InfyOmBaseController
{
    /** @var  Materia_PrimaRepository */
    private $materiaPrima;
    private $tercero;

    public function __construct(Materia_Prima $materiaPrimaModel, Tercero $terceroModel)
    {
        $this->materiaPrima = $materiaPrimaModel;
        $this->tercero = $terceroModel;
    }

    /**
     * Display a listing of the Materia_Prima.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(isset($request->codigo) || isset($request->nombre)){
            $_SESSION['codigo'] = strtoupper($request->codigo);
            $_SESSION['nombre'] = strtoupper($request->nombre);
            $materiaPrima = $this->materiaPrima->whereNull('deleted_at')->where(function($q){ $q->where('codigo', 'LIKE', $_SESSION['codigo'] . '%')->Where('nombre', 'LIKE', '%' . $_SESSION['nombre'] . '%');} )->paginate(20);
        }else{
            $materiaPrima = $this->materiaPrima->paginate(20);
        }

        if (count($materiaPrima) == 0) {
            Log::warning('Materia Prima, Index, No se encontró materia prima: ' . $request->fullUrl() );
            Flash::error('No se encontraron registros.');
        }else{
            Log::info('Materia Prima, Index, Lista dó materia prima: ' . $request->fullUrl() );
            Flash::success('Se encontraron los siguientes registros.');
        }

        return view('materiaPrima.index')
            ->with('materiaPrima', $materiaPrima);
    }

    /**
     * Show the form for creating a new Materia_Prima.
     *
     * @return Response
     */
    public function create()
    {
        $empresas = $this->tercero->leftJoin('tercero_empresa', 'tercero.id', '=', 'tercero_empresa.tercero_id')->leftJoin('empresa','tercero_empresa.empresa_id', '=', 'empresa.id')->whereNull('tercero.deleted_at')->whereNull('empresa.deleted_at')->whereNotNull('empresa.razon_social')->select('empresa.razon_social AS nombre','tercero.id')->get();
        $personas = $this->tercero->leftJoin('tercero_persona', 'tercero.id', '=', 'tercero_persona.tercero_id')->leftJoin('persona','tercero_persona.persona_id', '=', 'persona.id')->whereNull('tercero.deleted_at')->whereNull('persona.deleted_at')->whereNotNull('persona.nombre')->select(DB::raw('CONCAT(persona.nombre, \' \', persona.apellido) AS nombre'), 'tercero.id')->get();
        $proveedores = $empresas->merge($personas)->lists('nombre','id');
        return view('materiaPrima.create')->with('proveedores', $proveedores);
    }

    /**
     * Store a newly created Materia_Prima in storage.
     *
     * @param CreateMateria_PrimaRequest $request
     *
     * @return Response
     */
    public function store(CreateMateria_PrimaRequest $request)
    {
        $input = $request->all();

        $input['nombre'] = strtoupper($input['nombre']);
        $input['unidad_medida'] = strtoupper($input['unidad_medida']);
        $materiaPrima = $this->materiaPrima->create($input);
        $materiaPrima->terceros()->attach($input['tercero_id']);
        Log::info('Materia_Prima, store, Se almaceno la materia prima: ' . $materiaPrima->id . ', con el tercero: ' . $input['tercero_id'], [$input]);

        Flash::success('Materia_Prima saved successfully.');

        return redirect(route('materiaPrima.show', [$materiaPrima->id]));
    }

    /**
     * Display the specified Materia_Prima.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $materiaPrima = $this->materiaPrima->find($id);
        $tercero_id = $materiaPrima->terceros[0]->id;
        $tercero = $this->tercero->find($tercero_id);

        $sendtoview;
        if (count($tercero->personas) > 0) {
            $sendtoview = array('materiaPrima' => $materiaPrima, 'proveedor' => $tercero->personas[0]->nombre . ' ' . $tercero->personas[0]->apellido);
        }elseif (count($tercero->empresas) > 0) {
            $sendtoview = array('materiaPrima' => $materiaPrima, 'proveedor' => $tercero->empresas[0]->razon_social);
        }

        if (empty($materiaPrima)) {
            Log::error('Materia_Prima, Show, No se encuentra la materia prima: ' . $id);
            Flash::error('Materia_Prima not found');

            return redirect(route('materiaPrima.index'));
        }

        return view('materiaPrima.show')->with($sendtoview);
    }

    /**
     * Show the form for editing the specified Materia_Prima.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $materiaPrima = $this->materiaPrima->find($id);

        $empresas = $this->tercero->leftJoin('tercero_empresa', 'tercero.id', '=', 'tercero_empresa.tercero_id')->leftJoin('empresa','tercero_empresa.empresa_id', '=', 'empresa.id')->whereNull('tercero.deleted_at')->whereNull('empresa.deleted_at')->whereNotNull('empresa.razon_social')->select('empresa.razon_social AS nombre','tercero.id')->get();
        $personas = $this->tercero->leftJoin('tercero_persona', 'tercero.id', '=', 'tercero_persona.tercero_id')->leftJoin('persona','tercero_persona.persona_id', '=', 'persona.id')->whereNull('tercero.deleted_at')->whereNull('persona.deleted_at')->whereNotNull('persona.nombre')->select(DB::raw('CONCAT(persona.nombre, \' \', persona.apellido) AS nombre'), 'tercero.id')->get();
        $proveedores = $empresas->merge($personas)->lists('nombre','id');
        $materiaPrima['tercero_id'] = $materiaPrima->terceros[0]->id;
        $sendtoview = array('materiaPrima' => $materiaPrima, 'proveedores' => $proveedores);
        if (empty($materiaPrima)) {
            Log::error('Materia_Prima, edit, No se encuentra la materia prima: ' . $id);
            Flash::error('Materia_Prima not found');

            return redirect(route('materiaPrima.index'));
        }

        return view('materiaPrima.edit')->with($sendtoview);
    }

    /**
     * Update the specified Materia_Prima in storage.
     *
     * @param  int              $id
     * @param UpdateMateria_PrimaRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $materiaPrima = $this->materiaPrima->find($id);

        if (empty($materiaPrima)) {
            Log::error('Materia_Prima, update, No se encuentra la materia prima: ' . $id);
            Flash::error('Materia_Prima not found');

            return redirect(route('materiaPrima.index'));
        }

        $input = $request->all();

        $rules = UpdateMateria_PrimaRequest::rules($id);

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }
        $input['nombre'] = strtoupper($input['nombre']);
        $input['unidad_medida'] = strtoupper($input['unidad_medida']);

        $materiaPrima->terceros()->sync(array($input['tercero_id']));
        $materiaPrima->fill($input);
        $materiaPrima->save(); 

        Log::info('Materia_Prima, update, Se actualizó la materia prima: ' . $materiaPrima->id . ', con el tercero: ' . $input['tercero_id'], [$input]);

        Flash::success('Materia_Prima updated successfully.');

        return redirect(route('materiaPrima.show', [$materiaPrima->id]));
    }

    /**
     * Remove the specified Materia_Prima from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $materiaPrima = $this->materiaPrima->find($id);

        if (empty($materiaPrima)) {
            Log::error('Materia_Prima, update, No se encuentra la materia prima: ' . $id);
            Flash::error('Materia_Prima not found');

            return redirect(route('materiaPrima.index'));
        }

        $materiaPrima->delete($id);
        
        Log::info('Materia_Prima, destroy, Se eliminó la materia prima: ' . $materiaPrima->id);
        Flash::success('Materia_Prima deleted successfully.');

        return redirect(route('materiaPrima.index'));
    }
}
