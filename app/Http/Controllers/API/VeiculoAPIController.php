<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVeiculoAPIRequest;
use App\Http\Requests\API\UpdateVeiculoAPIRequest;
use App\Models\Veiculo;
use App\Repositories\VeiculoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VeiculoController
 * @package App\Http\Controllers\API
 */

class VeiculoAPIController extends AppBaseController
{
    /** @var  VeiculoRepository */
    private $veiculoRepository;

    public function __construct(VeiculoRepository $veiculoRepo)
    {
        $this->veiculoRepository = $veiculoRepo;
    }

    /**
     * Display a listing of the Veiculo.
     * GET|HEAD /veiculos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->veiculoRepository->pushCriteria(new RequestCriteria($request));
        $this->veiculoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $veiculos = $this->veiculoRepository->all();

        return $this->sendResponse($veiculos->toArray(), 'Veiculos retrieved successfully');
    }

    /**
     * Store a newly created Veiculo in storage.
     * POST /veiculos
     *
     * @param CreateVeiculoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVeiculoAPIRequest $request)
    {
        $input = $request->all();

        $veiculos = $this->veiculoRepository->create($input);

        return $this->sendResponse($veiculos->toArray(), 'Veiculo saved successfully');
    }

    /**
     * Display the specified Veiculo.
     * GET|HEAD /veiculos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Veiculo $veiculo */
        $veiculo = $this->veiculoRepository->findWithoutFail($id);

        if (empty($veiculo)) {
            return $this->sendError('Veiculo not found');
        }

        return $this->sendResponse($veiculo->toArray(), 'Veiculo retrieved successfully');
    }

    /**
     * Update the specified Veiculo in storage.
     * PUT/PATCH /veiculos/{id}
     *
     * @param  int $id
     * @param UpdateVeiculoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVeiculoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Veiculo $veiculo */
        $veiculo = $this->veiculoRepository->findWithoutFail($id);

        if (empty($veiculo)) {
            return $this->sendError('Veiculo not found');
        }

        $veiculo = $this->veiculoRepository->update($input, $id);

        return $this->sendResponse($veiculo->toArray(), 'Veiculo updated successfully');
    }

    /**
     * Remove the specified Veiculo from storage.
     * DELETE /veiculos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Veiculo $veiculo */
        $veiculo = $this->veiculoRepository->findWithoutFail($id);

        if (empty($veiculo)) {
            return $this->sendError('Veiculo not found');
        }

        $veiculo->delete();

        return $this->sendResponse($id, 'Veiculo deleted successfully');
    }
}
