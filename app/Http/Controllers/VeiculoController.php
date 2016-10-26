<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVeiculoRequest;
use App\Http\Requests\UpdateVeiculoRequest;
use App\Repositories\VeiculoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VeiculoController extends AppBaseController
{
    /** @var  VeiculoRepository */
    private $veiculoRepository;

    public function __construct(VeiculoRepository $veiculoRepo)
    {
        //only gerente and funcionario can acess this resource controller.
        $this->middleware('role:gerente|funcionario');

        $this->veiculoRepository = $veiculoRepo;
    }

    /**
     * Display a listing of the Veiculo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->veiculoRepository->pushCriteria(new RequestCriteria($request));
        $veiculos = $this->veiculoRepository->all();

        return view('veiculos.index')
            ->with('veiculos', $veiculos);
    }

    /**
     * Show the form for creating a new Veiculo.
     *
     * @return Response
     */
    public function create()
    {
        return view('veiculos.create');
    }

    /**
     * Store a newly created Veiculo in storage.
     *
     * @param CreateVeiculoRequest $request
     *
     * @return Response
     */
    public function store(CreateVeiculoRequest $request)
    {
        $input = $request->all();

        $veiculo = $this->veiculoRepository->create($input);

        Flash::success('Veiculo saved successfully.');

        return redirect(route('veiculos.index'));
    }

    /**
     * Display the specified Veiculo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $veiculo = $this->veiculoRepository->findWithoutFail($id);

        if (empty($veiculo)) {
            Flash::error('Veiculo not found');

            return redirect(route('veiculos.index'));
        }

        return view('veiculos.show')->with('veiculo', $veiculo);
    }

    /**
     * Show the form for editing the specified Veiculo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $veiculo = $this->veiculoRepository->findWithoutFail($id);

        if (empty($veiculo)) {
            Flash::error('Veiculo not found');

            return redirect(route('veiculos.index'));
        }

        return view('veiculos.edit')->with('veiculo', $veiculo);
    }

    /**
     * Update the specified Veiculo in storage.
     *
     * @param  int              $id
     * @param UpdateVeiculoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVeiculoRequest $request)
    {
        $veiculo = $this->veiculoRepository->findWithoutFail($id);

        if (empty($veiculo)) {
            Flash::error('Veiculo not found');

            return redirect(route('veiculos.index'));
        }

        $veiculo = $this->veiculoRepository->update($request->all(), $id);

        Flash::success('Veiculo updated successfully.');

        return redirect(route('veiculos.index'));
    }

    /**
     * Remove the specified Veiculo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $veiculo = $this->veiculoRepository->findWithoutFail($id);

        if (empty($veiculo)) {
            Flash::error('Veiculo not found');

            return redirect(route('veiculos.index'));
        }

        $this->veiculoRepository->delete($id);

        Flash::success('Veiculo deleted successfully.');

        return redirect(route('veiculos.index'));
    }
}