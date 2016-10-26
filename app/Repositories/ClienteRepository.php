<?php

namespace App\Repositories;

use App\Models\Cliente;
use InfyOm\Generator\Common\BaseRepository;

class ClienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'telefone',
        'cpf',
        'rg',
        'cnh',
        'endereco',
        'cep',
        'cidade',
        'observacoes'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cliente::class;
    }
}
