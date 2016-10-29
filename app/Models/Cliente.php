<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cliente
 * @package App\Models
 * @version October 26, 2016, 5:35 pm UTC
 */
class Cliente extends Model
{
    use SoftDeletes;

    public $table = 'clientes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'telefone' => 'string',
        'cpf' => 'string',
        'rg' => 'string',
        'cnh' => 'string',
        'endereco' => 'string',
        'cep' => 'string',
        'cidade' => 'string',
        'observacoes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'telefone' => 'required',
        'cpf' => 'required|unique:clientes',
        'rg' => 'required|unique:clientes',
        'cnh' => 'required|unique:clientes'
    ];


    public function solicitacoes()
    {
        return $this->hasMany('App\Solicitacao');
    }
    
}
