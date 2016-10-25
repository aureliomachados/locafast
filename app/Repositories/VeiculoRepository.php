<?php

namespace App\Repositories;

use App\Models\Veiculo;
use InfyOm\Generator\Common\BaseRepository;

class VeiculoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'modelo',
        'placa',
        'chassi',
        'cor',
        'ano',
        'observacao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Veiculo::class;
    }
}
